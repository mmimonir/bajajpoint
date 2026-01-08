<?php

namespace App\Http\Controllers;

use App\Models\Showroom\Core;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 1. Use constants or config instead of define() inside a method
        $sections = explode(',', Auth::user()->section);

        if (in_array('showroom', $sections)) {
            // Map keys to their respective report codes
            $reportMapping = [
                'bp' => 2000,
                'bh' => 2011,
                'bb' => 2030,
            ];

            $data = [];
            foreach ($reportMapping as $key => $code) {
                $data[$key] = $this->getReportStats($code);
            }

            return view('dashboard', compact('data'));
        }

        if (in_array('service', $sections)) {
            return view('service_dashboard');
        }

        return redirect()->home(); // Default fallback
    }

    private function getReportStats($report_code)
    {
        return [
            'total_lifting'          => $this->getTotalLiftingCount($report_code),
            'lifting_previous_month' => $this->getLiftingByPeriod($report_code, 'previous'),
            'lifting_this_month'     => $this->getLiftingByPeriod($report_code, 'current'),
            'tr_pending_data'        => $this->getTrPendingData($report_code),
        ];
    }

    private function getTotalLiftingCount($report_code)
    {
        $now = Carbon::now();
        // Simplified fiscal year logic
        $year = ($now->month > 6) ? $now->year : $now->year - 1;
        $startDate = Carbon::create($year, 7, 1)->toDateString();

        return Core::where('report_code', $report_code)
            ->whereBetween('purchage_date', [$startDate, $now->toDateString()])
            ->count(); // Use count() instead of get()
    }

    private function getLiftingByPeriod($report_code, $period = 'current')
    {
        $query = Core::where('report_code', $report_code);

        if ($period === 'previous') {
            $start = Carbon::now()->subMonthNoOverflow()->startOfMonth();
            $end = Carbon::now()->subMonthNoOverflow()->endOfMonth();
        } else {
            $start = Carbon::now()->startOfMonth();
            $end = Carbon::now();
        }

        return $query->whereBetween('purchage_date', [$start->toDateString(), $end->toDateString()])
            ->count();
    }

    private function getTrPendingData($report_code)
    {
        $baseQuery = Core::where('report_code', $report_code)
            ->where('vat_process', 'PENDING');

        // Get count
        $qty = (clone $baseQuery)->count();

        // Get sum using a join
        $amount = $baseQuery->join('mrps', 'mrps.model_code', '=', 'cores.model_code')
            ->sum('mrps.tr');

        return ['amount' => $amount, 'qty' => $qty];
    }

    // public function index()
    // {
    //     define('SERVICE', 'service');
    //     define('SHOWROOM', 'showroom');

    //     $user_details = User::find(Auth::user()->id);
    //     $section = explode(',', $user_details['section']);

    //     if (in_array(SHOWROOM, $section)) {
    //         return view('dashboard')
    //             ->with([
    //                 'data' => [
    //                     'bp' => [
    //                         'total_lifting' => $this->total_lifting(2000),
    //                         'lifting_previous_month' => $this->lifting_previous_month(2000),
    //                         'lifting_this_month' => $this->lifting_this_month(2000),
    //                         'tr_pending_data' => $this->tr_pending_data(2000),
    //                     ],
    //                     'bh' => [
    //                         'total_lifting' => $this->total_lifting(2011),
    //                         'lifting_previous_month' => $this->lifting_previous_month(2011),
    //                         'lifting_this_month' => $this->lifting_this_month(2011),
    //                         'tr_pending_data' => $this->tr_pending_data(2011),
    //                     ],
    //                     'bb' => [
    //                         'total_lifting' => $this->total_lifting(2030),
    //                         'lifting_previous_month' => $this->lifting_previous_month(2030),
    //                         'lifting_this_month' => $this->lifting_this_month(2030),
    //                         'tr_pending_data' => $this->tr_pending_data(2030),
    //                     ],
    //                 ],
    //             ]);
    //     } elseif (in_array(SERVICE, $section)) {
    //         return view('service_dashboard');
    //     }
    // }

    // public function total_lifting($report_code)
    // {
    //     $year = Carbon::now()->year;
    //     $today_month = Carbon::now()->month;

    //     if ($today_month > 6) {
    //         $year = Carbon::now()->year;
    //     } else {
    //         $year = Carbon::now()->year - 1;
    //     }

    //     $first_day_of_year = Carbon::createFromFormat('Y-m-d', $year . '-07-01')->toDateString();
    //     $today = Carbon::now()->toDateString();
    //     $lifting = Core::select('model_code')
    //         ->whereBetween('purchage_date', [$first_day_of_year, $today])
    //         ->where('report_code', '=', $report_code)
    //         ->get();
    //     $total_lifting = count($lifting);

    //     return $total_lifting;
    // }

    // public function lifting_previous_month($report_code)
    // {
    //     $first_day = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();
    //     $last_day = Carbon::now()->subMonthNoOverflow()->endOfMonth()->toDateString();

    //     $lifting_prev_month = Core::select('model_code')
    //         ->whereBetween('purchage_date', [$first_day, $last_day])
    //         ->where('report_code', '=', $report_code)
    //         ->get();
    //     $lifting_prev_month = count($lifting_prev_month);

    //     return $lifting_prev_month;
    // }

    // public function lifting_this_month($report_code)
    // {
    //     $first_day = Carbon::now()->startOfMonth()->toDateString();
    //     $today = Carbon::now()->toDateString();

    //     $lifting_this_month = Core::select('model_code')
    //         ->whereBetween('purchage_date', [$first_day, $today])
    //         ->where('report_code', '=', $report_code)
    //         ->get();
    //     $lifting_this_month = count($lifting_this_month);

    //     return $lifting_this_month;
    // }

    // public function tr_pending_data($report_code)
    // {
    //     $tr_pending_qty = count(Core::select('model_code')
    //         ->where('vat_process', '=', 'PENDING')
    //         ->where('report_code', $report_code)
    //         ->get());
    //     $tr_pending_amount = Core::rightJoin('mrps', 'mrps.model_code', '=', 'cores.model_code')
    //         ->select('mrps.tr')
    //         ->where('cores.vat_process', 'PENDING')
    //         ->where('cores.report_code', $report_code)
    //         ->sum('mrps.tr');

    //     return ['amount' => $tr_pending_amount, 'qty' => $tr_pending_qty];
    // }

    public function rg_number_update(Request $request)
    {
        Core::where('id', $request->id)->update(['rg_number' => $request->rg_number]);

        return response()->json(
            [
                'message' => 'RG Number Updated Successfully',
                'status' => 200,
            ]
        );
    }
}
