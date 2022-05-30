<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Showroom\Vehicle;
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
}
