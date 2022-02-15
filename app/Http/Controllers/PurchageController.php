<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mrp;
use App\Models\Core;
use App\Models\Purchage;
use App\Models\Supplier;
use App\Models\ColorCode;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchageController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::select('supplier_name')->where('status', '1')->get();
        $dealer_names = Supplier::select('dealer_name', 'supplier_code')->whereNotNull('dealer_name')->get();
        $mrps = Mrp::select('model_name', 'model_code')->whereNotNull('vat_purchage_mrp')->get();

        return view('dms.purchage.purchage_entry')->with(['suppliers' => $suppliers, 'mrps' => $mrps, 'dealer_names' => $dealer_names]);
    }
    public function create(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $supplier_code = Supplier::select('supplier_code')->where('supplier_name', $request->vendor)->value('supplier_code');

                $mc_purchage = new Purchage();
                $mc_purchage->factory_challan_no = $request['challan_no'];
                $mc_purchage->dealer_code = $supplier_code;
                $mc_purchage->purchage_date = $request['purchage_date'];
                $mc_purchage->vendor = $request['vendor'];
                $mc_purchage->dealer_name = $request['dealer_name'];
                $mc_purchage->purchage_value = $request['purchage_value'];
                $mc_purchage->quantity = $request['quantity'];
                $mc_purchage->save();

                $purchage_id = $mc_purchage->id;

                foreach ($request->model_code as $key => $value) {
                    $vat_rebate = round($request->purchage_price[$key] * 15 / 115);
                    $save_record = [
                        'store_id' => $purchage_id,
                        'vat_code' => $supplier_code,
                        'print_code' => $supplier_code,
                        'report_code' => $supplier_code,
                        'model_code' => $request->model_code[$key],
                        'five_chassis' => $request->five_chassis[$key],
                        'five_engine' => $request->five_engine[$key],
                        'color_code' => $request->color_code[$key],
                        'unit_price' => $request->unit_price[$key],
                        'unit_price_vat' => $request->unit_price_vat[$key],
                        'vat_purchage_mrp' => $request->vat_purchage_mrp[$key],
                        // 'vat_month_purchage' => $request->vat_month_purchage[$key],
                        // 'vat_year_purchage' => $request->vat_year_purchage[$key],
                        'purchage_price' => $request->purchage_price[$key],
                        'vat_rebate' => $vat_rebate,
                    ];
                    if ($supplier_code == 2000 || $supplier_code == 2011 || $supplier_code == 2030) {
                        $edited_array_one = Arr::add($save_record, 'vat_month_purchage', $request->vat_month_purchage[$key]);
                        $edited_array_two = Arr::add($edited_array_one, 'vat_year_purchage', $request->vat_year_purchage[$key]);
                        // $edited_array_two = Arr::collapse($save_record, ['vat_month_purchage' => $request->vat_month_purchage[$key], 'vat_year_purchage' => $request->vat_year_purchage[$key]]);
                        Core::insert($edited_array_two);
                    } else {
                        Core::insert($save_record);
                    };
                }
            });
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
    public function get_mrp(Request $request)
    {
        $color = ColorCode::select('model_name', 'color', 'color_code')->where('model_code', $request->model_code)->get();
        $mrp = Mrp::select('mrp', 'vat_mrp', 'vat_purchage_mrp', 'purchage_price')->where('model_code', $request->model_code)->get();
        // $mrp = Mrp::rightJoin('color_codes', 'color_codes.model_code', '=', 'mrps.model_code')
        //     ->select(
        //         'mrps.mrp',
        //         'mrps.vat_mrp',
        //         'mrps.vat_purchage_mrp',
        //         'mrps.purchage_price',
        //         'color_codes.color',
        //         'color_codes.color_code'
        //     )->where('model_code', "=", $request->model_code)
        //     ->get();
        return response()->json(['mrp' => $mrp, 'color' => $color]);
        // dd($mrp);
        // return response()->json($mrp);
    }
    public function purchage_list_index()
    {
        return view('dms.purchage.purchage_list');
    }
    public function purchage_list()
    {
        $purchages = Purchage::select('id', 'factory_challan_no', 'purchage_date', 'vendor', 'purchage_value', 'dealer_name', 'quantity')->whereYear('purchage_date', '>', '2020')->orderBy('id', 'desc')->get();
        return response()->json($purchages);
    }
    public function purchage_details($id)
    {
        $uml_data = Core::select('uml_mushak_no', 'mushak_date')->where('store_id', $id)->first();
        $purchages = Purchage::select(
            '*'
        )->where('id', $id)->first();

        $purchage_details = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.model_code',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.unit_price',
                'cores.unit_price_vat',
                'cores.vat_purchage_mrp',
                'cores.vat_year_purchage',
                'cores.purchage_price',
                'cores.print_code',
                'cores.original_sale_date',
                'cores.uml_mushak_no',
                'cores.mushak_date',
                'vehicles.model'
            )
            ->where('cores.store_id', "=", $id)
            ->get();
        return view('dms.purchage.purchage_details')
            ->with([
                'purchages' => $purchages,
                'purchage_details' => $purchage_details,
                'uml_data' => $uml_data
            ]);
    }
    public function purchage_detail_update(Request $request)
    {
        try {
            $update_record = [
                'factory_challan_no' => $request['challan_no'],
                'purchage_date' => $request['purchage_date'],
                'vendor' => $request['vendor'],
                'dealer_name' => $request['dealer_name'],
                'quantity' => $request['quantity'],
                'purchage_value' => $request['purchage_value'],
                'gate_pass' => $request['gate_pass'],
            ];
            Purchage::where('id', $request->id)->update($update_record);
            // return redirect()->route('purchage.list');
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
    public function purchage_by_date(Request $request)
    {
        $dealer_code = $request->print_code;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $purchage_data = Purchage::select(
            '*'
        )
            ->where('dealer_code', "=", $dealer_code)
            ->whereBetween('purchage_date', [$start_date, $end_date])
            ->orderBy('purchage_date', 'asc')
            ->get();

        return view('dms.purchage.purchage_by_date')->with(['purchage_data' => $purchage_data]);
    }
    public function purchage_by_month(Request $request)
    {
        try {
            $month = $request->month;
            $year = $request->year;

            $first_date = Carbon::create("{$month} {$year}")->firstOfMonth()->toDateString();
            $last_date = Carbon::create("{$month} {$year}")->lastOfMonth()->toDateString();

            $dealer_code = $request->print_code;
            $start_date = $first_date;
            $end_date = $last_date;

            $purchage_data = Purchage::select(
                '*'
            )
                ->where('dealer_code', "=", $dealer_code)
                ->whereBetween('purchage_date', [$start_date, $end_date])
                ->orderBy('purchage_date', 'asc')
                ->get();

            return view('dms.purchage.purchage_by_date')->with(['purchage_data' => $purchage_data]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function print_code_update(Request $request)
    {
        Core::where('store_id', $request->id)
            ->update([
                'print_code' => $request->print_code,
                'uml_mushak_no' => $request->uml_mushak_no,
                'mushak_date' => $request->mushak_date
            ]);
        return redirect()->back()->with('success', 'Print Code Updated');
    }
}
