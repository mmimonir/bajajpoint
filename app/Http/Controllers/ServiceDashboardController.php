<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service\SparePartsStock;

class ServiceDashboardController extends Controller
{
    public function index()
    {
        return view('service_dashboard');
    }
    public function load_job_card_view()
    {
        return view('service.job_card');
    }
    public static function part_id_search(Request $request)
    {
        $part_id = $request->part_id;
        $search_data = SparePartsStock::select(
            'part_id',
            'id',
            'part_name',
            'model_name',
            'rate',
            'stock_quantity',
            'location',
        )->where(['part_id' => $part_id])->first();

        return response()->json(['search_data' => $search_data]);
    }

    public function update_parts_location(Request $request)
    {
        $id = $request->id;
        $location = $request->location;

        $update_data = SparePartsStock::where(['id' => $id])->update(['location' => $location]);

        if ($update_data) {
            return response()->json(['msg' => 'Location updated successfully']);
        } else {
            return response()->json(['msg' => 'Something went wrong']);
        }
    }
}
