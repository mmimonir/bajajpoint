<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index()
    {
        return view('dms.vehicle.vehicle');
    }

    public function vehicle_get()
    {
        $vehicles = Vehicle::all();
        return response()->json($vehicles);
    }

    public function vehicle_add(Request $request)
    {
        Vehicle::create($request->all());
        return response()->json([
            'status' => 200,
        ]);
    }

    public function vehicle_update(Request $request)
    {
        Vehicle::whereModelCode($request->model_code)->update($request->all());
        return response()->json(['status' => 200]);
    }

    public function vehicle_delete(Request $request)
    {
        Vehicle::whereModelCode($request->model_code)->delete();
        return response()->json(['status' => 200]);
    }
}
