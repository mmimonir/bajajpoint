<?php

namespace App\Http\Controllers;

use App\Models\Mrp;
use Illuminate\Http\Request;

class PriceDeclareController extends Controller
{
    public function index()
    {
        return view('dms.price_declare.price_declare');
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

        // return redirect('first-team');
        // return view('dms.mrpedit', ['mrpDatas' => $mrpEditData]);
    }

    public function mrp_delete(Request $request)
    {
        // dd($request->model_code);
        Mrp::whereModelCode($request->model_code)->delete();
        return response()->json(['status' => 200]);
    }
}
