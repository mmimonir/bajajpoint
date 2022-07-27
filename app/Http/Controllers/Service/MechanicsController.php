<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Mechanic;
use Illuminate\Http\Request;

class MechanicsController extends Controller
{
    public function mechanics_index()
    {
        return view('dms.service.mechanics.mechanics');
    }

    public function mechanics_get()
    {
        $mechanics = Mechanic::all();
        return response()->json($mechanics);
    }

    public function get_single_mechanic(Request $request)
    {
        $mechanic = Mechanic::find($request->id);
        return response()->json($mechanic);
    }

    public function mechanics_add(Request $request)
    {
        Mechanic::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Mechanic added successfully'
        ]);
    }

    public function mechanics_update(Request $request)
    {
        Mechanic::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'success' => 'Mechanic updated successfully'
        ]);
    }

    public function mechanics_delete(Request $request)
    {
        Mechanic::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'success' => 'Mechanic deleted successfully'
        ]);
    }
}
