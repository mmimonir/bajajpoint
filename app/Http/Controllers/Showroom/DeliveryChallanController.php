<?php

namespace App\Http\Controllers\Showroom;

use Carbon\Carbon;
use App\Models\Showroom\{Mrp, Core, ColorCode, MoneyReceipt};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryChallanController extends Controller
{
    public function index()
    {
        return view('dms.showroom.utility.delivery_challan.delivery_challan');
    }
    public function money_receipt_html()
    {
        return view('dms.html_print.html_money_receipt');
    }
    public function money_receipt()
    {
        return view('dms.showroom.utility.delivery_challan.money_receipt');
    }
    public function create_receipt_no()
    {
        $receipt_no = 0;

        $today = Carbon::now()->toDateString();
        $today_month = Carbon::now()->format('m');
        $today_day = Carbon::now()->format('d');

        if ($today_month == '07' && $today_day == '01') {
            $receipt_data = MoneyReceipt::select('receipt_no')
                ->where('receipt_date', $today)
                ->orderBy('receipt_no', 'desc')
                ->first();
            if ($receipt_data) {
                $receipt_no = $receipt_data->receipt_no + 1;
            } else {
                $receipt_no = 1;
            }
        } else {
            $receipt_data = MoneyReceipt::select('receipt_no', 'receipt_date')
                ->orderBy('receipt_date', 'desc')
                ->first();

            if ($receipt_data) {
                $max_receipt_no = MoneyReceipt::select('receipt_no')
                    ->where('receipt_date', $receipt_data->receipt_date)
                    ->orderBy('receipt_no', 'desc')
                    ->first();

                $receipt_no = $max_receipt_no->receipt_no + 1;
            } else {
                $receipt_no = 1;
            }
        }

        return response()->json([
            'receipt_no' => $receipt_no,
            'status' => 200,
        ]);
    }
    public function store_created_receipt(Request $request)
    {
        try {
            $data = MoneyReceipt::updateOrCreate([
                'id' => $request->id,
            ], [
                'receipt_no' => $request->receipt_no,
                'receipt_date' => $request->receipt_date,
                'client_name' => $request->client_name,
                'client_mobile' => $request->client_mobile,
                'payment_method' => $request->payment_method,
                'cheque_date' => $request->cheque_date,
                'drawn_on' => $request->drawn_on,
                'on_account_of' => $request->on_account_of,
                'amount' => $request->amount,
            ]);
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
    public function load_receipt_list(Request $request)
    {
        $receipt_list = MoneyReceipt::select('*')
            ->where([
                'receipt_date' => $request->receipt_date ?? Carbon::now()->toDateString(),
            ])
            ->orderBy('receipt_date', 'asc')
            ->get();

        return response()->json(['receipt_list' => $receipt_list]);
    }
    public function load_single_receipt(Request $request)
    {
        $receipt_details = MoneyReceipt::select('*')
            ->where([
                'id' => $request->id,
            ])
            ->first();

        return response()->json([
            'receipt_details' => $receipt_details
        ]);
    }
    public function mc_return(Request $request)
    {
        try {
            Core::where('id', $request->id)
                ->first()
                ->update([
                    'address_one' => null,
                    'address_two' => null,
                    'customer_name' => null,
                    'father_name' => null,
                    'mother_name' => null,
                    'mobile' => null,
                    'nid_no' => null,
                    'sale_date' => null,
                    'original_sale_date' => null,
                    'print_date' => null,
                    'vat_sale_date' => null,
                    'in_stock' => 'yes',
                ]);
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
    public function color_list(Request $request)
    {
        $color_list = ColorCode::where('model_code', $request->model_code)->get();
        $color_code = Core::select('color_code')->where('id', $request->core_id)->first();

        return response()->json([
            'color_list' => $color_list,
            'color_code' => $color_code->color_code
        ]);
    }
    public function load_challan_list(Request $request)
    {
        $challan_list = Core::select('*')
            ->where([
                'sale_date' => $request->sale_date ?? Carbon::now()->toDateString(),
            ])
            ->orderBy('sale_date', 'asc')
            ->get();

        return response()->json(['challan_list' => $challan_list]);
    }
    public function load_single_challan(Request $request)
    {
        $challan_details = Core::rightJoin('color_codes', 'color_codes.color_code', '=', 'cores.color_code')
            ->rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.*',
                'cores.id as core_id',
                'color_codes.*',
                'vehicles.*'
            )
            ->where([
                'cores.id' => $request->id,
            ])
            ->first();

        return response()->json([
            'challan_details' => $challan_details
        ]);
    }

    public static function create_delivery_challan_no()
    {
        $delivery_challan_no = 0;

        $today = Carbon::now()->toDateString();
        $today_month = Carbon::now()->format('m');
        $today_day = Carbon::now()->format('d');

        if ($today_month == '07' && $today_day == '01') {
            $challan_data = Core::select('delivery_challan_no')
                ->where('sale_date', $today)
                ->orderBy('delivery_challan_no', 'desc')
                ->first();
            if ($challan_data) {
                $delivery_challan_no = $challan_data->delivery_challan_no + 1;
            } else {
                $delivery_challan_no = 1;
            }
        } else {
            $challan_data = Core::select('delivery_challan_no', 'sale_date')
                ->orderBy('vat_sale_date', 'desc')
                ->first();

            if ($challan_data) {
                $max_challan_no = Core::select('delivery_challan_no')
                    ->where('sale_date', $challan_data->sale_date)
                    ->orderBy('delivery_challan_no', 'desc')
                    ->first();

                $delivery_challan_no = $max_challan_no->delivery_challan_no + 1;
            } else {
                $delivery_challan_no = 1;
            }
        }

        return response()->json([
            'challan_no' => $delivery_challan_no,
            'status' => 200,
        ]);
    }

    public function get_stock_mc()
    {
        $stock_word = 'yes';
        $stock = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.purchage_date',
                'cores.five_chassis',
                'cores.five_engine',
                'vehicles.model',
            )
            ->where('cores.in_stock', 'yes')
            ->orderBy('vehicles.model', 'asc')
            ->get();

        return response()->json([
            'stock' => $stock,
            'status' => 200,
            'message' => 'Successfully fetched stock',
        ]);
    }

    public function get_stock_mc_details(Request $request)
    {
        $mc_details = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.model_code',
                'vehicles.model',
                'vehicles.no_of_cylinder_with_cc',
                'vehicles.seating_capacity',
                'vehicles.class_of_vehicle',
                'vehicles.model_make_of_vehicle',
                'cores.year_of_manufacture',
                'vehicles.ladan_weight',
                'vehicles.unladen_weight',
            )
            ->where('cores.id', $request->id)
            ->orderBy('vehicles.model', 'asc')
            ->first();

        $color_details = ColorCode::select('color_code', 'color')
            ->where('model_code', $mc_details->model_code)->get();

        $mrp_details = Mrp::select('*')
            ->where('model_code', $mc_details->model_code)->first();

        return response()->json([
            'mc_details' => $mc_details,
            'mrp_details' => $mrp_details,
            'color_details' => $color_details,
            'status' => 200,
            'message' => 'Successfully fetched stock',
        ]);
    }

    public function store_created_challan(Request $request)
    {
        // return response()->json($request->all());
        try {
            Core::where('id', $request->id)
                ->first()
                ->update([
                    'address_one' => $request->address_one,
                    'address_two' => $request->address_two,
                    'color_code' => $request->color_code,
                    'customer_name' => $request->customer_name,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'delivery_challan_no' => $request->delivery_challan_no,
                    'eight_chassis' => $request->eight_chassis,
                    'one_chassis' => $request->one_chassis,
                    'three_chassis' => $request->three_chassis,
                    'five_chassis' => $request->five_chassis,
                    'six_engine' => $request->six_engine,
                    'five_engine' => $request->five_engine,
                    'mobile' => $request->mobile,
                    'model_code' => $request->model_code,
                    'nid_no' => $request->nid_no,
                    'sale_date' => $request->sale_date,
                    'original_sale_date' => $request->sale_date,
                    'print_date' => $request->sale_date,
                    'vat_sale_date' => $request->sale_date,
                    'unit_price_vat' => $request->unit_price_vat,
                    'sale_price' => $request->sale_price,
                    'sale_vat' => $request->sale_vat,
                    'basic_price_vat' => $request->basic_price_vat,
                    'year_of_manufacture' => $request->year_of_manufacture,
                    'in_stock' => 'no',
                ]);
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
}
