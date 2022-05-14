<?php

namespace App\Http\Controllers;

use App\Models\Mrp;
use App\Models\PriceDeclare;
use Illuminate\Http\Request;

class PriceDeclareController extends Controller
{
    public function index()
    {
        return view('dms.price_declare.price_declare');
    }

    public function pd_get()
    {
        $pd_data = PriceDeclare::all();
        return response()->json($pd_data);
    }

    public function pd_add(Request $request)
    {
        PriceDeclare::create($request->all());
        return response()->json([
            'status' => 200,
        ]);
    }

    public function pd_update(Request $request)
    {
        PriceDeclare::whereModelCode($request->model_code)->update($request->all());
        return response()->json(['status' => 200]);

        // return redirect('first-team');
        // return view('dms.mrpedit', ['mrpDatas' => $mrpEditData]);
    }

    public function pd_delete(Request $request)
    {
        // dd($request->model_code);
        PriceDeclare::whereModelCode($request->model_code)->delete();
        return response()->json(['status' => 200]);
    }
}
