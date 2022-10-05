<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\SparePartsStock;
use Illuminate\Http\Request;

class SparePartsStockController extends Controller
{
    public function current_stock_init()
    {
        return view('dms.service.parts_stock.current_stock_parts');
    }
    public function current_stock()
    {
        $stock = SparePartsStock::select('*')
            ->where('stock_quantity', '>', 0)
            ->where('category', 'spare_parts')
            ->get();

        return response()->json(['stock' => $stock]);
    }
    public function parts_stock_low_init()
    {
        return view('dms.service.parts_stock.low_stock_parts');
    }
    public function parts_stock_low()
    {
        $stock = SparePartsStock::select('*')
            ->where('stock_quantity', '>', 0)
            ->where('stock_quantity', '<', 6)
            ->where('category', 'spare_parts')
            ->get();

        return response()->json(['stock' => $stock]);
    }
}
