<?php

namespace App\Http\Controllers;

use App\Models\ColorCode;
use App\Models\Core;
use App\Models\Purchage;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_info($id)
    {
        try {
            $core_data = Core::select('*')->where('id', $id)->first();
            $purchage_id = $core_data->store_id;
            $model_code = $core_data->model_code;
            $color_code = $core_data->color_code;

            $purchage_data = Purchage::select('*')->where('id', $purchage_id)->first();
            $model_data = Vehicle::select('*')->where('model_code', $model_code)->first();
            $color_data = ColorCode::select('*')->where('color_code', $color_code)->first();

            // dd($core_data, $purchage_data, $model_data, $color_data);
            return view('dms.customer_info')->with([
                'core_data' => $core_data,
                'purchage_data' => $purchage_data,
                'model_data' => $model_data,
                'color_data' => $color_data
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
