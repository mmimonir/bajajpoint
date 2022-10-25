<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\Mrp;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MrpController extends Controller
{
    public function index()
    {
        return view('dms.showroom.mrp.mrp');
    }

    public function mrp_get()
    {
        $Mrps = Mrp::all();

        return response()->json($Mrps);
    }

    public function get_single_mrp(Request $request)
    {
        $mrp = Mrp::find($request->id);

        return response()->json($mrp);
    }

    public function mrp_add(Request $request)
    {
        Mrp::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Mrp added successfully',
        ]);
    }

    public function mrp_update(Request $request)
    {
        Mrp::whereId($request->id)->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Mrp updated successfully',
        ]);
    }

    public function mrp_delete(Request $request)
    {
        // dd($request->model_code);
        Mrp::whereId($request->id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Mrp deleted successfully',
        ]);
    }
}
