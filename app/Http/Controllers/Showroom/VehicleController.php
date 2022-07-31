<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{

    public function index()
    {
        return view('dms.showroom.vehicle.vehicle');
    }

    public function vehicle_get()
    {
        $vehicles = Vehicle::all();
        return response()->json($vehicles);
    }

    public function get_single_vehicle(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        return response()->json($vehicle);
    }

    public function vehicle_add(Request $request)
    {
        Vehicle::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle added successfully.'
        ]);
    }

    public function vehicle_update(Request $request)
    {
        Vehicle::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle updated successfully.'
        ]);
    }

    public function vehicle_delete(Request $request)
    {
        Vehicle::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle deleted successfully.'
        ]);
    }
}
