<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use App\Models\Service\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service\SparePartsSale;

class ServiceBillController extends Controller
{
    public function create_bill()
    {
        return view('service.bill.create_bill');
    }

    public function load_bill_list()
    {
        $bill_list = Bill::select('bill_no')
            ->where([
                'bill_date' => Carbon::now()->toDateString(),
                'request_from' => 'bill_page'
            ])
            ->orderBy('bill_no', 'asc')
            ->get();
        return response()->json(['bill_list' => $bill_list]);
    }

    public function store_bill(Request $request)
    {
        $store_bill  = JobCardController::delivery_done($request);
        return response()->json([
            'store_bill' => $store_bill->original,
            'message' => 'Bill created successfully.',
            'status' => 200
        ]);
    }

    public function load_single_bill(Request $request)
    {
        // return response()->json($request->all());
        $bill_details = Bill::select('*')
            ->where([
                'bill_no' => $request->bill_no,
                'bill_date' => Carbon::now()->toDateString(),
                'request_from' => 'bill_page'
            ])
            ->first();

        // fetch spare parts sale details based on job card no
        $spare_parts_sale_details = SparePartsSale::rightJoin('spare_parts_stocks', 'spare_parts_stocks.part_id', '=', 'spare_parts_sales.part_id')
            ->select(
                'spare_parts_stocks.*',
                'spare_parts_sales.*'
            )
            ->where([
                'spare_parts_sales.bill_no' => $request->bill_no,
                'spare_parts_sales.sale_date' => Carbon::now()->toDateString(),
                'request_from' => 'bill_page'
            ])
            ->get();

        return response()->json([
            'bill_details' => $bill_details,
            'spare_parts_sale_details' => $spare_parts_sale_details,
        ]);
    }
}
