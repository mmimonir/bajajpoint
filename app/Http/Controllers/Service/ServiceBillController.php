<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Bill;
use App\Models\Service\SparePartsSale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_bill()
    {
        return view('dms.service.bill.create_bill');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function html_bill(Request $request)
    {
        $bill_data = Bill::rightJoin(
            'service_customers',
            'service_customers.id',
            '=',
            'bills.service_customer_id'
        )->rightJoin(
            'spare_parts_sales',
            'spare_parts_sales.bill_id',
            '=',
            'bills.id'
        )->rightJoin(
            'spare_parts_stocks',
            'spare_parts_stocks.part_id',
            '=',
            'spare_parts_sales.part_id'
        )
            ->select(
                'bills.*',
                'spare_parts_stocks.*',
                'service_customers.*',
                'spare_parts_sales.*'
            )->where(
                'bills.id',
                $request->id
            )->get();

        return view('dms.html_print.html_bill')
            ->with(['bill_data' => $bill_data]);
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
        $store_bill = JobCardController::delivery_done($request);

        return response()->json([
            'store_bill' => $store_bill->original,
            'message' => 'Bill created successfully.',
            'status' => 200,
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
            'jb_details' => $jb_details,
        ]);
    }
}
