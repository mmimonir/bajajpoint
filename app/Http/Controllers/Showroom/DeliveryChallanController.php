<?php

namespace App\Http\Controllers\Showroom;

use Illuminate\Http\Request;
use App\Models\Showroom\Core;
use App\Http\Controllers\Controller;

class DeliveryChallanController extends Controller
{
    public function index()
    {
        return view('dms.showroom.utility.delivery_challan.delivery_challan');
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
        // $mc_details = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
        //     ->select(
        //         'cores.id',
        //         'cores.five_chassis',
        //         'cores.five_engine',
        //         'cores.model_code',
        //         'vehicles.model',
        //         'vehicles.no_of_cylinder_with_cc',
        //         'vehicles.seating_capacity',
        //         'vehicles.class_of_vehicle',
        //     )
        //     ->where('cores.id', $request->id)
        //     ->orderBy('vehicles.model', 'asc')
        //     ->get();

        // return response()->json([
        //     'mc_details' => $mc_details,
        //     'status' => 200,
        //     'message' => 'Successfully fetched stock',
        // ]);
    }
}
