<?php

/**
 * EnvKit debug collector — transport shared by the Laravel provider and the
 * Symfony subscriber. Buffers captured signals in memory and flushes them to the
 * EnvKit debug-ingest server AFTER the response is sent (fastcgi_finish_request),
 * so a request being debugged pays ~zero added latency. Entirely dependency-free
 * (raw curl/stream), reads its per-project toggles from the EnvKit state file.
 *
 * This file is copied verbatim into the project by EnvKit (App\EnvKit namespace),
 * so it MUST stay self-contained.
 */

namespace App\EnvKit;

final class Client
{
    /** @var array<int,array<string,mixed>> */
    private array $buffer = [];

    private bool $registered = false;

    private string $requestId;

    /** Request line ("GET /orders/42") tagged onto every event; null for CLI. */
    private ?string $request = null;

    /** @var array<string,mixed>|null */
    private ?array $state = null;

    public function __construct(
        private readonly string $site = '',
    ) {
        $this->requestId = bin2hex(random_bytes(8));
    }

    /** Resolve EnvKit's per-project state (enabled, passthrough, slowMs, …). */
    public function state(): array
    {
        if ($this->state !== null) {
            return $this->state;
        }
        $dir = getenv('ENVKIT_DEBUG_DIR') ?: '';
        $defaults = [
            'enabled' => false,
            'passthrough' => false,
            'slowMs' => 100,
            'captureWorkers' => false,
            'site' => $this->site,
        ];
        if ($dir === '') {
            return $this->state = $defaults;
        }
        // Key MUST match the TS rootKey(): sha1 of the lowercased, slash-normalized
        // root, first 16 hex chars.
        $root = function_exists('base_path') ? base_path() : getcwd();
        $norm = strtolower(rtrim(str_replace('\\', '/', (string) $root), '/'));
        $key = substr(sha1($norm), 0, 16);
        $file = rtrim($dir, '/\\') . '/' . $key . '.json';
        $data = @file_get_contents($file);
        if ($data !== false) {
            $parsed = json_decode($data, true);
            if (is_array($parsed)) {
                return $this->state = array_merge($defaults, $parsed);
            }
        }

        return $this->state = $defaults;
    }

    public function enabled(): bool
    {
        return (bool) ($this->state()['enabled'] ?? false)
            && (getenv('ENVKIT_DEBUG_INGEST') !== false);
    }

    public function passthrough(): bool
    {
        return (bool) ($this->state()['passthrough'] ?? false);
    }

    public function slowMs(): int
    {
        return (int) ($this->state()['slowMs'] ?? 100);
    }

    public function captureWorkers(): bool
    {
        return (bool) ($this->state()['captureWorkers'] ?? false);
    }

    public function requestId(): string
    {
        return $this->requestId;
    }

    /** Set the request line tagged onto subsequent events (web requests only). */
    public function setRequest(string $request): void
    {
        $this->request = $request;
    }

    /** Queue one event; lazily wires the after-response flush on first use. */
    public function record(string $type, array $payload): void
    {
        $payload['type'] = $type;
        $payload['requestId'] = $this->requestId;
        if ($this->request !== null) {
            $payload['request'] = $this->request;
        }
        if (PHP_SAPI === 'cli') {
            $payload['worker'] = true;
        }
        $this->buffer[] = $payload;
        $this->ensureFlushRegistered();
        // Workers are long-lived: flush eagerly so their activity streams live
        // instead of only at process end.
        if (PHP_SAPI === 'cli' && count($this->buffer) >= 1) {
            $this->flush();
        }
    }

    private function ensureFlushRegistered(): void
    {
        if ($this->registered) {
            return;
        }
        $this->registered = true;
        // Runs on normal end AND on dd()/exit() — the only reliable post-dd hook.
        register_shutdown_function(function (): void {
            if (function_exists('fastcgi_finish_request')) {
                @fastcgi_finish_request();
            }
            $this->flush();
        });
    }

    /** POST the buffered events to the EnvKit ingest server (best-effort). */
    public function flush(): void
    {
        if ($this->buffer === []) {
            return;
        }
        $url = getenv('ENVKIT_DEBUG_INGEST');
        $token = getenv('ENVKIT_DEBUG_TOKEN') ?: '';
        if ($url === false || $url === '') {
            $this->buffer = [];
            return;
        }
        $events = $this->buffer;
        $this->buffer = [];
        $root = function_exists('base_path') ? base_path() : getcwd();
        $body = json_encode([
            'site' => $this->site,
            'root' => $root,
            'events' => $events,
        ]);
        if ($body === false) {
            return;
        }
        $this->post((string) $url, $token, $body);
    }

    private function post(string $url, string $token, string $body): void
    {
        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'X-EnvKit-Token: ' . $token,
                ],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 2,
                CURLOPT_CONNECTTIMEOUT => 1,
            ]);
            @curl_exec($ch);
            curl_close($ch);

            return;
        }
        // Fallback when ext-curl is unavailable.
        $ctx = stream_context_create(['http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\nX-EnvKit-Token: {$token}\r\n",
            'content' => $body,
            'timeout' => 2,
        ]]);
        @file_get_contents($url, false, $ctx);
    }
}
