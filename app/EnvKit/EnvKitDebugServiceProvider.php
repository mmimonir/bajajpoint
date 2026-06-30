<?php

/**
 * EnvKit Debug collector for Laravel. Captures dump()/dd(), SQL queries (with the
 * timing EnvKit uses for N+1 / slow-query detection), outgoing mail, rendered
 * views, dispatched events, queued jobs, and outgoing HTTP, then streams them to
 * the EnvKit Debug window. Inert unless EnvKit has enabled debug for this project
 * (see {@see Client::enabled()}), so it is safe to leave registered.
 *
 * Installed + removed by EnvKit (copied to app/EnvKit/, registered in
 * bootstrap/providers.php or config/app.php). Self-contained — only Laravel and
 * Symfony VarDumper (always present in a Laravel app) are assumed.
 */

namespace App\EnvKit;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\VarDumper;

class EnvKitDebugServiceProvider extends ServiceProvider
{
    private ?Client $client = null;

    public function boot(): void
    {
        $client = new Client($this->siteName());
        if (! $client->enabled()) {
            return;
        }
        // Queue-worker (CLI) capture is opt-in.
        if (PHP_SAPI === 'cli' && ! $client->captureWorkers()) {
            return;
        }
        $this->client = $client;

        // Tag every event with the request line ("GET /orders/42") so the Debug
        // window can group a request's signals under one header. Web SAPI only —
        // CLI workers have no request and group by job/worker instead.
        if (PHP_SAPI !== 'cli') {
            $method = isset($_SERVER['REQUEST_METHOD']) ? (string) $_SERVER['REQUEST_METHOD'] : '';
            $uri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '';
            $line = trim($method . ' ' . $uri);
            if ($line !== '') {
                $client->setRequest($line);
            }
        }

        $this->hookDumps($client);
        $this->hookQueries($client);
        $this->hookMail($client);
        $this->hookViews($client);
        $this->hookCache($client);
        $this->hookEvents($client);
        $this->hookJobs($client);
        $this->hookHttp($client);

        // Flush after the framework finishes (HTTP). dd()/exit are covered by the
        // shutdown function the client registers on first record().
        $this->app->terminating(static function () use ($client): void {
            $client->flush();
        });
    }

    private function siteName(): string
    {
        $dir = getenv('ENVKIT_DEBUG_DIR') ?: '';
        if ($dir !== '') {
            // The state file carries the EnvKit site name; cheaper to read here than
            // to plumb it through env.
            $root = function_exists('base_path') ? base_path() : getcwd();
            $key = substr(sha1(strtolower(rtrim(str_replace('\\', '/', (string) $root), '/'))), 0, 16);
            $data = @file_get_contents(rtrim($dir, '/\\') . '/' . $key . '.json');
            if ($data !== false) {
                $parsed = json_decode($data, true);
                if (is_array($parsed) && isset($parsed['site'])) {
                    return (string) $parsed['site'];
                }
            }
        }
        try {
            return (string) config('app.name', '');
        } catch (\Throwable) {
            return '';
        }
    }

    /** Intercept dump()/dd() via VarDumper; render to HTML for the window. */
    private function hookDumps(Client $client): void
    {
        $cloner = new VarCloner();
        $htmlDumper = new HtmlDumper();
        $passthrough = $client->passthrough();

        VarDumper::setHandler(function ($var) use ($client, $cloner, $htmlDumper, $passthrough): void {
            $data = $cloner->cloneVar($var);
            $html = $htmlDumper->dump($data, true);
            $caller = $this->callerFrame();
            $client->record('dump', [
                'label' => 'dump',
                'html' => is_string($html) ? $html : '',
                'source' => $caller,
            ]);
            // Clean response unless passthrough: only echo inline when asked.
            if ($passthrough) {
                $htmlDumper->dump($data);
            }
        });
    }

    private function hookQueries(Client $client): void
    {
        DB::listen(static function ($query) use ($client): void {
            $client->record('query', [
                'label' => $query->sql,
                'durationMs' => (int) round((float) $query->time),
                'data' => [
                    'sql' => $query->sql,
                    'bindings' => array_map(static fn ($b) => is_scalar($b) || $b === null ? $b : (string) json_encode($b), $query->bindings),
                    'connection' => method_exists($query, 'getConnectionName') ? $query->getConnectionName() : ($query->connectionName ?? ''),
                    'timeMs' => (float) $query->time,
                ],
            ]);
        });
    }

    private function hookMail(Client $client): void
    {
        $event = '\\Illuminate\\Mail\\Events\\MessageSending';
        if (! class_exists($event)) {
            return;
        }
        Event::listen($event, static function ($e) use ($client): void {
            $message = $e->message ?? null; // Symfony\Component\Mime\Email
            $subject = '';
            $to = [];
            try {
                if ($message) {
                    $subject = method_exists($message, 'getSubject') ? (string) $message->getSubject() : '';
                    foreach ((method_exists($message, 'getTo') ? $message->getTo() : []) as $addr) {
                        $to[] = method_exists($addr, 'getAddress') ? $addr->getAddress() : (string) $addr;
                    }
                }
            } catch (\Throwable) {
                // best-effort
            }
            $client->record('mail', [
                'label' => $subject !== '' ? $subject : 'Mail',
                'data' => ['subject' => $subject, 'to' => $to],
            ]);
        });
    }

    private function hookViews(Client $client): void
    {
        View::composer('*', static function ($view) use ($client): void {
            $client->record('view', [
                'label' => $view->getName(),
                'data' => ['name' => $view->getName(), 'path' => $view->getPath()],
            ]);
        });
    }

    private function hookCache(Client $client): void
    {
        $kinds = [
            '\\Illuminate\\Cache\\Events\\CacheHit' => 'hit',
            '\\Illuminate\\Cache\\Events\\CacheMissed' => 'miss',
            '\\Illuminate\\Cache\\Events\\KeyWritten' => 'write',
            '\\Illuminate\\Cache\\Events\\KeyForgotten' => 'forget',
        ];
        foreach ($kinds as $event => $op) {
            if (! class_exists($event)) {
                continue;
            }
            Event::listen($event, static function ($e) use ($client, $op): void {
                $key = '';
                $store = '';
                try {
                    $key = isset($e->key) ? (string) $e->key : '';
                    $store = isset($e->storeName) ? (string) $e->storeName : '';
                } catch (\Throwable) {
                    // best-effort
                }
                $client->record('cache', [
                    'label' => $key !== '' ? $key : $op,
                    'data' => ['op' => $op, 'key' => $key, 'store' => $store],
                ]);
            });
        }
    }

    private function hookEvents(Client $client): void
    {
        Event::listen('*', static function (string $name, array $payload) use ($client): void {
            // Skip framework noise (and our own listeners) to keep the stream useful.
            if (str_starts_with($name, 'Illuminate\\') || str_starts_with($name, 'eloquent.')) {
                return;
            }
            $client->record('event', [
                'label' => $name,
                'data' => ['name' => $name, 'payloadCount' => count($payload)],
            ]);
        });
    }

    private function hookJobs(Client $client): void
    {
        try {
            \Illuminate\Support\Facades\Queue::before(static function ($e) use ($client): void {
                $client->record('job', [
                    'label' => self::jobName($e),
                    'data' => ['state' => 'processing', 'name' => self::jobName($e)],
                ]);
            });
            \Illuminate\Support\Facades\Queue::after(static function ($e) use ($client): void {
                $client->record('job', [
                    'label' => self::jobName($e),
                    'data' => ['state' => 'processed', 'name' => self::jobName($e)],
                ]);
            });
            \Illuminate\Support\Facades\Queue::failing(static function ($e) use ($client): void {
                $client->record('job', [
                    'label' => self::jobName($e),
                    'data' => ['state' => 'failed', 'name' => self::jobName($e)],
                ]);
            });
        } catch (\Throwable) {
            // Queue facade may be unavailable in some minimal apps.
        }
    }

    private static function jobName($e): string
    {
        try {
            if (isset($e->job) && method_exists($e->job, 'resolveName')) {
                return (string) $e->job->resolveName();
            }
        } catch (\Throwable) {
            // fall through
        }

        return 'job';
    }

    private function hookHttp(Client $client): void
    {
        // Laravel 10.14+ exposes global middleware on the HTTP client *factory*.
        // `Http` is a facade, so method_exists() on the facade CLASS is always
        // false (the method lives on the resolved Factory, reached via
        // __callStatic) — check the facade root instead, or HTTP never captures.
        $factory = \Illuminate\Support\Facades\Http::getFacadeRoot();
        if (! is_object($factory) || ! method_exists($factory, 'globalResponseMiddleware')) {
            return;
        }
        try {
            $factory->globalResponseMiddleware(static function ($response) use ($client) {
                try {
                    $req = $response->transferStats?->getRequest();
                    $uri = $req ? (string) $req->getUri() : '';
                    $method = $req ? $req->getMethod() : '';
                    $ms = $response->transferStats ? (float) $response->transferStats->getTransferTime() * 1000 : null;
                    $client->record('http', [
                        'label' => trim($method . ' ' . $uri),
                        'durationMs' => $ms !== null ? (int) round($ms) : null,
                        'data' => ['method' => $method, 'uri' => $uri, 'status' => $response->status()],
                    ]);
                } catch (\Throwable) {
                    // best-effort
                }

                return $response;
            });
        } catch (\Throwable) {
            // ignore — HTTP capture is best-effort
        }
    }

    /** Best-effort user-code frame for a dump (skip the collector + framework). */
    private function callerFrame(): array
    {
        foreach (debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 30) as $frame) {
            $file = $frame['file'] ?? '';
            if ($file === '' || str_contains($file, 'EnvKit') || str_contains($file, 'var-dumper') || str_contains($file, '/vendor/')) {
                continue;
            }

            return ['file' => $file, 'line' => (int) ($frame['line'] ?? 0)];
        }

        return ['file' => '', 'line' => 0];
    }
}
