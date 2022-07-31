<?php

namespace App\Http\Controllers\Showroom;

use PDF;
use App\Models\Showroom\Core;
use App\Models\Showroom\Vehicle;
use App\Models\Showroom\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
    public function print_dashboard()
    {
        $dealer = Supplier::select('dealer_name', 'supplier_code')->whereNotNull('dealer_name')->get();
        return view('dms.print_dashboard')->with(['dealer' => $dealer]);
    }
    public function excel_dashboard()
    {
        $dealer = Supplier::select('dealer_name', 'supplier_code')->whereNotNull('dealer_name')->get();
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

        return view('dms.showroom.uml.customer_data')->with(['customer_data' => $customer_data]);
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
    function print_list_dashboard(Request $request)
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
        return response()->json($builder);
    }
    public function brta_assessment_form($id)
    {
        $core_data  = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.eight_chassis',
                'cores.one_chassis',
                'cores.three_chassis',
                'cores.five_chassis',
                'cores.six_engine',
                'cores.five_engine',
                'cores.customer_name',
                'cores.father_name',
                'cores.address_two',
                'cores.mobile',
                'vehicles.class_of_vehicle',
                'vehicles.seating_capacity',
                'vehicles.ladan_weight',
                'vehicles.cubic_capacity',
            )->where('cores.id', $id)->first();

        return view('dms.html_print.brta.assessment_form')->with(['data' => $core_data]);
    }
    public function brta_stamp($id)
    {
        $core_data = Core::select(
            'customer_name',
            'father_name',
            'address_one',
            'address_two',
            'eight_chassis',
            'one_chassis',
            'three_chassis',
            'five_chassis',
            'six_engine',
            'five_engine',
        )->where('id', $id)->first();
        return view('dms.html_print.brta.stamp')->with(['data' => $core_data]);
    }
}
