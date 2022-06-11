<?php

namespace App\Http\Controllers\Showroom;

use DB;
use App\Models\Showroom\Mrp;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MrpController extends Controller
{
    public function index()
    {
        return view('dms.mrp.mrp');
    }

    public function mrp_get()
    {
        $Mrps = Mrp::all();
        return response()->json($Mrps);
    }

    public function mrp_add(Request $request)
    {
        Mrp::create($request->all());
        return response()->json([
            'status' => 200,
        ]);
    }

    public function mrp_update(Request $request)
    {
        Mrp::whereModelCode($request->model_code)->update($request->all());
        return response()->json(['status' => 200]);
    }

    public function mrp_delete(Request $request)
    {
        // dd($request->model_code);
        Mrp::whereModelCode($request->model_code)->delete();
        return response()->json(['status' => 200]);
    }
}
