<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use App\Models\Service\Bill;
use Illuminate\Http\Request;
use App\Models\Service\JobCard;
use App\Http\Controllers\Controller;
use App\Models\Service\SparePartsSale;

class ServiceBillController extends Controller
{
    public function create_bill()
    {
        return view('dms.service.bill.create_bill');
    }
    public function html_bill()
    {
        return view('dms.html_print.html_bill');
    }

    public function load_bill_list(Request $request)
    {
        $bill_list = Bill::select('*')
            ->where([
                'bill_date' => $request->bill_date ?? Carbon::now()->toDateString(),
                // 'request_from' => $request->request_from ?? 'bill_page'
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
                'id' => $request->id,
                // 'bill_no' => $request->bill_no,
                // 'bill_date' => $request->bill_date ?? Carbon::now()->toDateString(),
                // 'request_from' => 'bill_page'
            ])
            ->first();

        // fetch spare parts sale details based on job card no
        $spare_parts_sale_details = SparePartsSale::rightJoin('spare_parts_stocks', 'spare_parts_stocks.part_id', '=', 'spare_parts_sales.part_id')
            ->select(
                'spare_parts_stocks.*',
                'spare_parts_sales.*'
            )
            ->where([
                'spare_parts_sales.bill_id' => $request->id,
                // 'spare_parts_sales.sale_date' => $request->bill_date ?? Carbon::now()->toDateString(),
                // 'request_from' => 'bill_page'
            ])
            ->get();
        $jb_details = SparePartsSale::rightJoin('service_customers', 'service_customers.id', '=', 'spare_parts_sales.customer_id')
            ->select(
                'service_customers.*'
            )
            ->where([
                'spare_parts_sales.bill_id' => $request->id,
                // 'spare_parts_sales.sale_date' => $request->bill_date ?? Carbon::now()->toDateString(),
                // 'request_from' => 'bill_page'
            ])
            ->first();

        return response()->json([
            'bill_details' => $bill_details,
            'spare_parts_sale_details' => $spare_parts_sale_details,
            'jb_details' => $jb_details
        ]);
    }
}
