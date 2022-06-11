<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\{Core, Vehicle, Purchage, Supplier, ColorCode, PriceDeclare};
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function sales_update_modal(Request $request)
    {
        $id = $request->id;
        $core_data = Core::select('*')->where('id', $id)->first();
        $model_code = $core_data->model_code;
        $store_id = $core_data->store_id;
        $print_ref = Supplier::select('print_ref')->whereNotNull('dealer_name')->get();
        $vehicle_data = Vehicle::select('model')->where('model_code', $model_code)->first();
        $purchage_data = Purchage::select('purchage_date', 'vendor', 'factory_challan_no')->where('id', $store_id)->first();
        $color_data = ColorCode::select('color_code', 'color')->where('model_code', $model_code)->get();
        $pd_data = PriceDeclare::select('id', 'vat_mrp', 'submit_date')->where(['model_code' => $model_code, 'status' => '1', 'dealer_code' => $core_data->vat_code])->first();

        return response()->json(
            [
                'core_data' => $core_data,
                'vehicle_data' => $vehicle_data,
                'purchage_data' => $purchage_data,
                'color_data' => $color_data,
                'pd_data' => $pd_data,
                'print_ref' => $print_ref
            ]
        );
    }
    public function sales_update($id)
    {

        $core_data = Core::select('*')->where('id', $id)->first();
        $model_code = $core_data->model_code;
        $store_id = $core_data->store_id;
        $print_ref = Supplier::select('print_ref')->whereNotNull('dealer_name')->get();
        $vehicle_data = Vehicle::select('model')->where('model_code', $model_code)->first();
        $purchage_data = Purchage::select('purchage_date', 'vendor', 'factory_challan_no')->where('id', $store_id)->first();
        $color_data = ColorCode::select('color_code', 'color')->where('model_code', $model_code)->get();
        $pd_data = PriceDeclare::select('id', 'vat_mrp', 'submit_date')->where(['model_code' => $model_code, 'status' => '1'])->first();


        return view('dms.sales.sales_update', [
            'core_data' => $core_data,
            'print_ref' => $print_ref,
            'vehicle_data' => $vehicle_data,
            'purchage_data' => $purchage_data,
            'color_data' => $color_data,
            'pd_data' => $pd_data,
        ]);
    }

    public function sales_update_store(Request $request)
    {
        try {
            Core::where('id', $request->id)
                ->first()
                ->update([
                    'eight_chassis' => $request->eight_chassis,
                    'one_chassis' => $request->one_chassis,
                    'three_chassis' => $request->three_chassis,
                    'five_chassis' => $request->five_chassis,
                    'six_engine' => $request->six_engine,
                    'five_engine' => $request->five_engine,
                    'customer_name' => $request->customer_name,
                    'relation' => $request->relation,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'address_one' => $request->address_one,
                    'address_two' => $request->address_two,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'dob' => $request->dob,
                    'vat_code' => $request->vat_code,
                    'print_code' => $request->print_code,
                    'report_code' => $request->report_code,
                    'vat_sale_date' => $request->vat_sale_date,
                    'original_sale_date' => $request->original_sale_date,
                    'sale_date' => $request->sale_date,
                    'print_date' => $request->print_date,
                    'nid_no' => $request->nid_no,
                    'ckd_process' => $request->ckd_process,
                    'approval_no' => $request->approval_no,
                    'invoice_no' => $request->invoice_no,
                    'sale_mushak_no' => $request->sale_mushak_no,
                    'whos_vat' => $request->whos_vat,
                    'color_code' => $request->color_code,
                    'stage' => $request->stage,
                    'unit_price_vat' => $request->unit_price_vat,
                    'tr_month_code' => $request->tr_month_code,
                    'vat_year_sale' => $request->vat_year_sale,
                    'vat_month_sale' => $request->vat_month_sale,
                    'vat_process' => $request->vat_process,
                    'rg_number' => $request->rg_number,
                    'sale_price' => $request->sale_price,
                    'sale_profit' => $request->sale_profit,
                    'dealer' => $request->dealer,
                    'print_ref' => $request->print_ref,
                    'evl_invoice_no' => $request->evl_invoice_no,
                    'note' => $request->note,
                    'fake_sale_date' => $request->fake_sale_date,
                    'sale_vat' => $request->sale_vat,
                    'basic_price_vat' => $request->basic_price_vat,
                    'model' => $request->model,
                    'uml_mushak_no' => $request->uml_mushak_no,
                    'mushak_date' => $request->mushak_date,
                    'tr_number' => $request->tr_number,
                    'tr_dep_date' => $request->tr_dep_date,
                    'year_of_manufacture' => $request->year_of_manufacture
                ]);
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
    public function sales_report(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $sale_report = Core::rightJoin('purchages', 'purchages.id', '=', 'cores.store_id')
            ->rightJoin('color_codes', 'color_codes.color_code', '=', 'cores.color_code')
            ->rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.dealer',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.sale_price',
                'cores.customer_name',
                'cores.mobile',
                'cores.original_sale_date',
                'cores.sale_profit',
                'vehicles.model',
                'color_codes.color',
                'purchages.vendor'
            )
            ->whereBetween('cores.original_sale_date', [$start_date, $end_date])
            ->orderBy('original_sale_date', 'asc')
            ->get();

        // dd($sale_report);

        return view('dms.sales.sales_report')->with(['sale_report' => $sale_report]);
    }
}
