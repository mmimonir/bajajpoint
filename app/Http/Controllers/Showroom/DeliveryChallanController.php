<?php

namespace App\Http\Controllers\Showroom;

use Illuminate\Http\Request;
use App\Models\Showroom\Core;
use App\Http\Controllers\Controller;

class DeliveryChallanController extends Controller
{
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
}
