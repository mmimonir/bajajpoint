<?php

namespace App\Http\Controllers\Showroom;


use App\Models\Showroom\{Core, Helper, Purchage, Supplier};
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class VATController extends Controller
{
    public function index()
    {
        $dealer = Supplier::select('dealer_name', 'supplier_code')->whereNotNull('dealer_name')->get();
        // $models = Vehicle::select('model_code', 'model')->where('status', '=', 'Active')->get();

        $tr_code = Core::select('tr_month_code', 'vat_process')->where('vat_process', '=', 'PENDING')->first();
        $tr_code_status = Core::select('tr_month_code')->where('tr_month_code', 'PENDING')->first();

        // $last_tr_code = Core::select('tr_month_code')->whereNotNull('tr_month_code')->get()->last();
        $last_tr_code = Helper::select('last_tr_code as tr_month_code')->first();
        $models = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select('cores.model_code', 'vehicles.model')
            ->where('cores.tr_month_code', '=', $last_tr_code->tr_month_code)
            ->whereNull('cores.tr_number')
            ->distinct()
            ->get();
        // $last_tr_code = Core::select('tr_month_code')
        //     ->where("mushak_date", ">", Carbon::now()->subMonths(3))
        //     ->get()
        //     ->last();
        $whos_vat = Core::select('whos_vat')
            ->where('tr_month_code', '=', $last_tr_code->tr_month_code)
            ->whereNull('tr_number')
            ->get()
            ->unique('whos_vat');

        return view('dms.vat_dashboard')
            ->with(
                [
                    'models' => $models,
                    'tr_code' => $tr_code,
                    'last_tr_code' => $last_tr_code,
                    'whos_vat' => $whos_vat,
                    'dealer' => $dealer,
                    'helper_tr' => $last_tr_code,
                    'tr_code_status' => $tr_code_status,
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
                'vehicles.model'
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereNotNull('cores.sale_mushak_no')
            ->whereBetween('cores.vat_sale_date', [$start_date, $end_date])
            ->orderBy('sale_mushak_no')
            ->get()
            ->groupBy('vat_sale_date');

        return view('dms.html_print.vat.vat_sale')->with(['vat_data' => $data, 'vat_code' => $vat_code]);
    }
    public function vat_sale_by_model(Request $request)
    {
        $vat_code = $request->vat_code;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.customer_name',
                'cores.model_code',
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
                DB::raw('MONTH(cores.vat_sale_date) as month')
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereNotNull('cores.sale_mushak_no')
            ->whereBetween('cores.vat_sale_date', [$start_date, $end_date])
            ->orderBy('cores.sale_mushak_no')
            ->get()
            ->groupBy(['model', 'month']);

        return view('dms.html_print.vat.vat_sale_by_model')->with(['vat_data' => $data, 'vat_code' => $vat_code]);
    }
    public function assign_tr_number(Request $request)
    {
        try {
            $whos_vat = $request->whos_vat;
            $tr_number = $request->tr_number;
            $tr_month_code = $request->tr_month_code;

            $tr_pending = Core::select('id', 'print_code')
                ->where([
                    'tr_month_code' => $tr_month_code,
                    'whos_vat' => $whos_vat,
                ])->get();
            $update_record = ['tr_number' => $tr_number];
            foreach ($tr_pending as $key => $tr_data) {
                foreach ($request->model_code as $key => $value) {
                    Core::where([
                        'whos_vat' => $whos_vat,
                        'tr_month_code' => $tr_month_code,
                        'model_code' => $value
                    ])->update($update_record);
                }
            }
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }


    public function assign_tr_code(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Helper::where('id', 1)->update(['last_tr_code' => $request->tr_month_code]);

                Core::where('vat_process', '=', 'PENDING')->update(['tr_month_code' => $request->tr_month_code]);
                $whos_vat = Core::select('print_code')->where('vat_process', '=', 'PENDING')->get();
                foreach ($whos_vat as $key => $value) {
                    $print_code = $value->print_code;
                    $whos_vat_code = $print_code == 2000 ? 'BP VAT' : ($print_code == 2011 ? 'BH VAT' : ($print_code == 2030 ? 'BB VAT' : ('BP VAT')));

                    Core::where(
                        ['vat_process' => 'PENDING', 'tr_month_code' => $request->tr_month_code, 'print_code' => $print_code]
                    )->update(['whos_vat' => $whos_vat_code]);
                }
            });
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }

    public function update_tr_status(Request $request)
    {
        try {
            Core::where(['tr_month_code' => $request->tr_code])
                ->update([
                    'vat_process' => 'VAT OK',
                    'tr_dep_date' => $request->tr_dep_date
                ]);

            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
    public function tr_changer_update(Request $request)
    {
        try {
            $tr_changer = $request->tr_changer;
            Purchage::where(['tr_changer' => $tr_changer, 'vat_process' => 'PENDING'])
                ->update([
                    'vat_process' => 'VAT OK',
                    'whos_vat' => $tr_changer,
                    'tr_dep_date' => $request->tr_dep_date
                ]);

            return redirect()->back()->with('success', 'TR Status Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
    public function assign_sale_mushak_no(Request $request)
    {
        $vat_code = $request->vat_code;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $mushak_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('purchages', 'purchages.id', '=', 'cores.store_id')
            ->select(
                'cores.id',
                'cores.sale_mushak_no',
                'cores.vat_code',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.vat_sale_date',
                'cores.mushak_date',
                'cores.vat_process',
                'cores.original_sale_date',
                'vehicles.model',
                'purchages.purchage_date',
            )->where('cores.vat_code', "=", $vat_code)
            ->whereBetween('cores.vat_sale_date', [$start_date, $end_date])
            ->orderBy('cores.sale_mushak_no')
            ->get();

        return view('dms.showroom.vat.sale_mushak_sl_gen')->with(['mushak_data' => $mushak_data]);
    }
    public function assign_sale_mushak_no_store(Request $request)
    {
        // $vat_sale_date = Carbon::parse($request->vat_sale_date);
        try {
            $mushak_data = Core::find($request->id);
            $mushak_data->sale_mushak_no = $request->sale_mushak_no;
            $mushak_data->vat_sale_date = $request->vat_sale_date;
            $mushak_data->save();
            return response()->json(['success' => 'Data is successfully updated', 'status' => 200, 'id' => $request->id]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }

    public function uml_mushak_update(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $purchage_data = Core::rightJoin('purchages', 'purchages.id', '=', 'cores.store_id')
            ->rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'purchages.vendor',
                'purchages.factory_challan_no',
                'cores.id',
                'cores.report_code',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.vat_purchage_mrp',
                'cores.vat_rebate',
                'cores.purchage_price',
                'cores.uml_mushak_no',
                'cores.mushak_date',
                'cores.purchage_date',
                'cores.vat_year_purchage',
                'cores.vat_month_purchage',
                'vehicles.model',
            )
            ->whereBetween('cores.purchage_date', [$start_date, $end_date])
            ->orderBy('cores.purchage_date')
            ->get();
        return view('dms.showroom.vat.uml_mushak_update')
            ->with([
                'purchage_data' => $purchage_data
            ]);
    }
    public function uml_mushak_update_store(Request $request)
    {
        try {
            $mushak_data = Core::find($request->id);
            $mushak_data->uml_mushak_no = $request->uml_mushak_no;
            $mushak_data->mushak_date = $request->mushak_date;
            $mushak_data->save();
            return response()->json(['success' => 'Data is successfully updated', 'status' => 200, 'id' => $request->id]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
}
