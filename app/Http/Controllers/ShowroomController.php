<?php

namespace App\Http\Controllers;

use App\Models\Showroom\Core;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function current_stock_init()
    {
        return view('dms.showroom.mc_stock.current_stock');
    }
    public function current_stock()
    {
        $stock = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.*',
                'vehicles.model'
            )
            ->get();

        return view('dms.showroom.mc_stock.current_stock');
    }
}
