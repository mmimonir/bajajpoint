<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Core;
use App\Models\Purchage;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VATController extends Controller
{
    public function index()
    {
        $models = Vehicle::select('model_code', 'model')->where('status', '=', 'Active')->get();
        $tr_code = Purchage::select('tr_month_code', 'vat_process')->where('vat_process', '=', 'PENDING')->first();
        $last_tr_code = Purchage::select('tr_month_code')->latest('updated_at')->first();
        $tr_code_vat_pending = Purchage::select('tr_month_code')->where('vat_process', '=', 'PENDING')->first();
        return view('dms.vat_dashboard')
            ->with(
                [
                    'models' => $models,
                    'tr_code' => $tr_code,
                    'last_tr_code' => $last_tr_code,
                    'tr_code_vat_pending' => $tr_code_vat_pending
                ]
            );
    }
    public function vat_index()
    {
        $start_date = '2022-01-01';
        $end_date = '2022-02-10';
        $vat_code = '2000';
        $vat_year_sale = '20212022';

        $maxValue = Core::where('vat_code', '=', '2000')->where('vat_year_purchage', '=', '20212022')->max('sale_mushak_no');

        $this->final_value = $maxValue + 1;

        $vat_sale_data = Core::select('id', 'model', 'vat_sale_date', 'customer_name', 'five_chassis')
            ->where('vat_year_purchage', '=', $vat_year_sale)
            ->whereNull('sale_mushak_no')
            ->where('vat_code', '=', $vat_code)
            ->whereBetween('vat_sale_date', [$start_date, $end_date])
            ->orderBy('vat_sale_date', 'asc')
            ->get();

        if ($vat_sale_data->count() > 0) {
            foreach ($vat_sale_data as $key => $value) {
                $update_record = ['sale_mushak_no' => $this->final_value];
                Core::where('id', $value->id)->update($update_record);
                $this->final_value++;
            }
            return redirect()->back()->with('success', 'VAT Sale Challan No Generated Successfully');
        } else {
            return 'No Data Found';
        }
    }
    public function vat_sale(Request $request)
    {
        $vat_code = $request->vat_code;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.customer_name',
                'cores.full_address',
                'cores.vat_code',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.vat_sale_date',
                'cores.sale_mushak_no',
                'cores.basic_price_vat',
                'cores.sale_vat',
                'cores.unit_price_vat',
                'vehicles.model',
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereNotNull('cores.sale_mushak_no')
            ->whereBetween('cores.vat_sale_date', [$start_date, $end_date])
            ->orderBy('sale_mushak_no')
            ->get()
            ->groupBy('vat_sale_date');

        return view('dms.html_print.vat.vat_sale')->with(['date_data' => $data, 'vat_code' => $vat_code]);

        // $pdf = PDF::loadView('dms.pdf.vat.vat_sale_bp', ['date_data' => $data]);
        // $pdf->setPaper('A4', 'landscape');
        // return $pdf->stream('vat_sale_bp');
    }
    public function tr_update(Request $request)
    {
        $tr_pending = Purchage::select('id')->where('tr_month_code', '=', $request->tr_month_code)->get();
        $update_record = ['tr_number' => $request->tr_number];
        foreach ($tr_pending as $key => $tr_data) {
            foreach ($request->model_code as $key => $value) {
                Core::where(['store_id' => $tr_data->id, 'model_code' => $value])->update($update_record);
            }
        }
    }

    public function assign_tr_code(Request $request)
    {
        Purchage::where('vat_process', '=', 'PENDING')->update(['tr_month_code' => $request->tr_month_code]);
        return redirect()->back()->with('success', 'TR Code Assigned Successfully');
    }

    public function update_tr_status(Request $request)
    {
        Purchage::where('tr_month_code', '=', $request->tr_code)
            ->update([
                'vat_process' => 'VAT OK',
                'tr_dep_date' => $request->tr_dep_date
            ]);

        return redirect()->back()->with('success', 'TR Status Updated Successfully');
    }
}
