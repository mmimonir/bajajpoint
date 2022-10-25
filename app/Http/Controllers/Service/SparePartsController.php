<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\SparePartsStock;
use Illuminate\Http\Request;

class SparePartsController extends Controller
{
    public function add_new_parts(Request $request)
    {
        SparePartsStock::updateOrCreate(
            ['id' => $request->id],
            [
                'part_id' => $request->part_id,
                'stock_quantity' => $request->stock_quantity,
                'part_name' => $request->part_name,
                'model_name' => $request->model_name,
                'rate' => $request->rate,
                'location' => $request->location,
                'category' => 'spare_parts',
            ]
        );

        return response()->json(
            [
                'msg' => 'Spare Parts Stock Saved Successfully.',
                'status' => 200,
            ]
        );
    }

    public function add_new_mobil(Request $request)
    {
        SparePartsStock::updateOrCreate(
            ['id' => $request->id],
            [
                'part_id' => $request->part_id,
                'stock_quantity' => $request->stock_quantity,
                'rate' => $request->rate,
                'location' => $request->location,
                'part_name' => $request->mobil_description,
                'mobil_brand_name' => $request->mobil_brand_name,
                'category' => 'mobil',
            ]
        );

        return response()->json(
            [
                'msg' => 'Spare Parts Stock Saved Successfully.',
                'status' => 200,
            ]
        );
    }
}
