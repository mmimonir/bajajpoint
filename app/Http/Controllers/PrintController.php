<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Core;
use App\Models\Supplier;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print_dashboard()
    {
        $dealer = Supplier::select('dealer_name', 'supplier_code')->whereNotNull('dealer_name')->get();
        // dd($dealer);
        return view('dms.print_dashboard')->with(['dealer' => $dealer]);
    }
    public function excel_dashboard()
    {
        $dealer = Supplier::select('dealer_name', 'supplier_code')->whereNotNull('dealer_name')->get();
        // dd($dealer);
        return view('dms.excel_dashboard')->with(['dealer' => $dealer]);
    }
    public function customer_data(Request $request)
    {
        $report_code = $request->report_code;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $customer_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('color_codes', 'color_codes.color_code', '=', 'cores.color_code')
            ->select(
                'cores.customer_name',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.report_code',
                'cores.mobile',
                'cores.original_sale_date',
                'vehicles.cubic_capacity',
                'vehicles.model',
                'color_codes.color'
            )
            ->where('cores.report_code', "=", $report_code)
            ->whereBetween('cores.original_sale_date', [$start_date, $end_date])
            ->orderBy('original_sale_date', 'asc')
            ->get();
        // dd($customer_data);

        return view('dms.uml.customer_data')->with(['customer_data' => $customer_data]);
    }

    public function file_print(Request $request)
    {
        $print_code = request('print_code');
        $start_date = request('start_date');
        $end_date = request('end_date');

        $print_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('purchages', 'purchages.id', '=', 'cores.store_id')
            ->select(
                'cores.customer_name',
                'cores.father_name',
                'cores.address_one',
                'cores.address_two',
                'cores.chassis_no',
                'cores.engine_no',
                'cores.original_sale_date',
                'cores.vat_sale_date',
                'cores.mobile',
                'cores.uml_mushak_no',
                'cores.approval_no',
                'cores.invoice_no',
                'cores.sale_mushak_no',
                'cores.dealer',
                'cores.vat_process',
                'cores.tr_number',
                'cores.tr_month_code',
                'cores.basic_price_vat',
                'cores.sale_vat',
                'cores.unit_price_vat',
                'cores.print_ref',
                'cores.color',
                'purchages.challan_no',
                'purchages.purchage_date',
                'vehicles.*'
            )
            ->where('cores.print_code', "=", $print_code)
            ->whereBetween('cores.original_sale_date', [$start_date, $end_date])
            ->orderBy('sale_mushak_no', 'asc')
            ->get();

        return view('dms.pdf.file.print_file_html')->with(['print_data' => $print_data]);
        // $pdf = PDF::loadView('dms.pdf.file.print_file', ['print_data' => $print_data]);
        // $pdf->setPaper('A4', 'portrait');
        // return $pdf->stream('bajaj_point.pdf');
    }

    function print_list(Request $request)
    {
        $term = $request;
        $builder = [];
        if (!empty($term['five_chassis']) || !empty($term['five_engine'])) {
            $builder = Core::select(
                'cores.id',
                'cores.original_sale_date',
                'cores.eight_chassis',
                'cores.one_chassis',
                'cores.three_chassis',
                'cores.five_chassis',
                'cores.six_engine',
                'cores.five_engine',
                'cores.customer_name',
                'cores.mobile',
                'cores.model',
            )
                ->where([
                    ['cores.five_chassis', '=', $term['five_chassis']],
                    ['cores.five_engine', '=', $term['five_engine']],
                ])
                ->get();
        }
        if (!empty($term['five_chassis'])) {
            // $builder = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            $builder = Core::select(
                'cores.id',
                'cores.original_sale_date',
                'cores.eight_chassis',
                'cores.one_chassis',
                'cores.three_chassis',
                'cores.five_chassis',
                'cores.six_engine',
                'cores.five_engine',
                'cores.customer_name',
                'cores.mobile',
                'cores.model',
            )
                ->where('cores.five_chassis', "=", $term['five_chassis'])
                ->get();

            // $model_code = $builder->model_code;
            // $model = Vehicle::select('model')->where('model_code', $model_code);
            // dd($model_code);
            // if ($model) {
            //     array_push($builder, $model);
            // }
        }
        if (!empty($term['five_engine'])) {
            $builder = Core::select(
                'cores.id',
                'cores.original_sale_date',
                'cores.eight_chassis',
                'cores.one_chassis',
                'cores.three_chassis',
                'cores.five_chassis',
                'cores.six_engine',
                'cores.five_engine',
                'cores.customer_name',
                'cores.mobile',
                'cores.model',
            )
                ->where('cores.five_engine', "=", $term['five_engine'])
                ->get();
        }

        // $five_chassis = $request->five_chassis;
        // $five_engine = $request->five_engine;
        // $print_lists = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')

        //     ->select(
        //         'cores.id',
        //         'cores.eight_chassis',
        //         'cores.one_chassis',
        //         'cores.three_chassis',
        //         'cores.five_chassis',
        //         'cores.six_engine',
        //         'cores.five_engine',
        //         'cores.customer_name',
        //         'cores.mobile',
        //         'vehicles.model'
        //     )
        //     ->where('cores.five_chassis', "=", $five_chassis)            
        //     ->get();

        return view('dms.print_list', ['print_lists' => $builder]);
    }
    public function hform(Request $request)
    {
        $print_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('color_codes', 'color_codes.color_code', '=', 'cores.color_code')
            ->select(
                'cores.customer_name',
                'cores.father_name',
                'cores.address_one',
                'cores.address_two',
                'cores.eight_chassis',
                'cores.one_chassis',
                'cores.three_chassis',
                'cores.five_chassis',
                'cores.six_engine',
                'cores.five_engine',
                'cores.mobile',
                'cores.year_of_manufacture',
                'color_codes.color',
                'vehicles.*'
            )
            ->where('cores.id', "=", $request->id)
            ->get();
        // return view('dms.html_print.brta.hform', ['print_data' => $print_data]);

        $pdf = PDF::loadView('dms.pdf.brta.hform', ['print_data' => $print_data]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('dms.pdf.brta.hform');
    }
    public function single_file_print(Request $request)
    {
        $print_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('purchages', 'purchages.id', '=', 'cores.store_id')
            ->select(
                'cores.customer_name',
                'cores.father_name',
                'cores.address_one',
                'cores.address_two',
                'cores.chassis_no',
                'cores.engine_no',
                'cores.original_sale_date',
                'cores.vat_sale_date',
                'cores.mobile',
                'cores.uml_mushak_no',
                'cores.approval_no',
                'cores.invoice_no',
                'cores.sale_mushak_no',
                'cores.dealer',
                'cores.vat_process',
                'cores.tr_number',
                'cores.tr_month_code',
                'cores.basic_price_vat',
                'cores.sale_vat',
                'cores.unit_price_vat',
                'cores.print_ref',
                'cores.color',
                'purchages.challan_no',
                'purchages.purchage_date',
                'vehicles.*'
            )
            ->where('cores.id', "=", $request->id)
            ->get();

        return view('dms.pdf.file.print_file_html')->with(['print_data' => $print_data]);
    }
}
