<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Core;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('dashboard')
            ->with([
                'bp' => [
                    'total_lifting' => $this->total_lifting(2000),
                    'lifting_previous_month' => $this->lifting_previous_month(2000),
                    'lifting_this_month' => $this->lifting_this_month(2000),
                    'tr_pending_data' => $this->tr_pending_data(2000),
                ],
                'bh' => [
                    'total_lifting' => $this->total_lifting(2011),
                    'lifting_previous_month' => $this->lifting_previous_month(2011),
                    'lifting_this_month' => $this->lifting_this_month(2011),
                    'tr_pending_data' => $this->tr_pending_data(2011),
                ],
                'bb' => [
                    'total_lifting' => $this->total_lifting(2030),
                    'lifting_previous_month' => $this->lifting_previous_month(2030),
                    'lifting_this_month' => $this->lifting_this_month(2030),
                    'tr_pending_data' => $this->tr_pending_data(2030),
                ]
            ]);
    }

    public function total_lifting($report_code)
    {
        $first_day_of_year = Carbon::createFromFormat('Y-m-d H:s:i', date('Y') . '-07-01 00:00:00')->subYear()->toDateString();
        $today = Carbon::now()->toDateString();
        $lifting = Core::select('model_code')
            ->whereBetween('purchage_date', [$first_day_of_year, $today])
            ->where('report_code', '=', $report_code)
            ->get();
        $total_lifting = count($lifting);

        return $total_lifting;
    }
    public function lifting_previous_month($report_code)
    {
        $first_day = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();
        $last_day = Carbon::now()->subMonthNoOverflow()->endOfMonth()->toDateString();

        $lifting_prev_month = Core::select('model_code')
            ->whereBetween('purchage_date', [$first_day, $last_day])
            ->where('report_code', '=', $report_code)
            ->get();
        $lifting_prev_month = count($lifting_prev_month);

        return $lifting_prev_month;
    }
    public function lifting_this_month($report_code)
    {
        $first_day = Carbon::now()->startOfMonth()->toDateString();
        $today = Carbon::now()->toDateString();

        $lifting_this_month = Core::select('model_code')
            ->whereBetween('purchage_date', [$first_day, $today])
            ->where('report_code', '=', $report_code)
            ->get();
        $lifting_this_month = count($lifting_this_month);

        return $lifting_this_month;
    }
    public function tr_pending_data($report_code)
    {
        $tr_pending_qty = count(Core::select('model_code')
            ->where('vat_process', '=', 'PENDING')
            ->where('report_code', $report_code)
            ->get());
        $tr_pending_amount = Core::rightJoin('mrps', 'mrps.model_code', '=', 'cores.model_code')
            ->select('mrps.tr')
            ->where('cores.vat_process', 'PENDING')
            ->where('cores.report_code', $report_code)
            ->sum('mrps.tr');
        return ['amount' => $tr_pending_amount, 'qty' => $tr_pending_qty];
    }
}
