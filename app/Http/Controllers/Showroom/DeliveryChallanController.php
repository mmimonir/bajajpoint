<?php

namespace App\Http\Controllers\Showroom;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Showroom\Core;
use App\Models\Showroom\ColorCode;
use App\Http\Controllers\Controller;
use App\Models\Showroom\Mrp;

class DeliveryChallanController extends Controller
{
    public function index()
    {
        return view('dms.showroom.utility.delivery_challan.delivery_challan');
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
        $stock = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.purchage_date',
                'cores.five_chassis',
                'cores.five_engine',
                'vehicles.model',
            )
            ->where('cores.in_stock', 'YES')
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
        try {
            Core::where('id', $request->id)
                ->first()
                ->update([
                    'address_one' => $request->address_one,
                    'address_two' => $request->address_two,
                    'color_code' => $request->color_code,
                    'customer_name' => $request->customer_name,
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
                    'year_of_manufacture' => $request->year_of_manufacture,
                ]);
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
}
