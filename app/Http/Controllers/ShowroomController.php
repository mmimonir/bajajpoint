<?php

namespace App\Http\Controllers;

use App\Models\Showroom\Core;

class ShowroomController extends Controller
{
    public function current_stock_init()
    {
        return view('dms.showroom.mc_stock.current_stock');
    }

    public function current_stock()
    {
        $stock = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->leftJoin('color_codes', 'color_codes.color_code', '=', 'cores.color_code')
            ->select(
                'cores.id',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.purchage_price',
                'cores.mc_location',
                'vehicles.model',
                'color_codes.color'
            )
            ->where('in_stock', '=', 'yes')
            ->get();

        return response()->json(['stock' => $stock]);
    }
}
