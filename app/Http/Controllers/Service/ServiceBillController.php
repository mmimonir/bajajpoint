<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use App\Models\Service\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceBillController extends Controller
{
    public function create_bill()
    {
        return view('service.bill.create_bill');
    }

    public function load_bill_list()
    {
        $bill_list = Bill::select('bill_no')
            ->where('bill_date', Carbon::now()->toDateString())
            ->orderBy('bill_no', 'asc')
            ->get();
        return response()->json(['bill_list' => $bill_list]);
    }

    public function store_bill(Request $request)
    {
        $store_bill  = JobCardController::delivery_done($request);
        return response()->json(['store_bill' => $store_bill->original]);
    }
}
