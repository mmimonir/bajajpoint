<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\Mrp;
use App\Models\Showroom\PriceDeclare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function get_single_pd(Request $request)
    {
        $pd_data = PriceDeclare::find($request->id);
        return response()->json($pd_data);
    }

    public function pd_add(Request $request)
    {
        PriceDeclare::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Price Declare Added Successfully'
        ]);
    }

    public function pd_update(Request $request)
    {
        PriceDeclare::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Price Declare Updated Successfully'
        ]);
    }

    public function pd_delete(Request $request)
    {
        PriceDeclare::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Price Declare Deleted Successfully'
        ]);
    }
}
