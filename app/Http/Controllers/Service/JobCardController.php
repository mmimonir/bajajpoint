<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Showroom\Vehicle;
use App\Models\SparePartsStock;
use Illuminate\Http\Request;

class JobCardController extends Controller
{
    public function load_job_card_view()
    {
        return view('service.job_card');
    }
    public function create_job_card(Request $request)
    {
        return response()->json(['data' => $request->all()]);
    }
    public function load_basic_data()
    {
        $all_vehicle = Vehicle::select('model', 'model_code')->get();
        return response()->json(['vehicle' => $all_vehicle]);
    }
    public function search_by_part_id(Request $request)
    {
        $part_id = $request->part_id;
        $data = SparePartsStock::select('part_id as value', 'id')->where('part_id', 'LIKE', '%' . $part_id . '%')->get();
        return response()->json($data);
    }
    public function search_by_full_part_id(Request $request)
    {
        $part_id = $request->part_id;
        $data = SparePartsStock::select('part_id', 'id', 'part_name', 'rate')->where(['part_id' => $part_id])->first();
        return response()->json($data);
    }
}
