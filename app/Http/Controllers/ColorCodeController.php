<?php

namespace App\Http\Controllers;

use App\Models\ColorCode;
use Illuminate\Http\Request;

class ColorCodeController extends Controller
{
    public function index()
    {
        return view('dms.color_code.color_code');
    }

    public function color_code_get()
    {
        $color_codes = ColorCode::all();
        return response()->json($color_codes);
    }

    public function color_code_add(Request $request)
    {
        ColorCode::create($request->all());
        return response()->json([
            'status' => 200,
        ]);
    }

    public function color_code_update(Request $request)
    {
        // dd($request->all());
        ColorCode::whereId($request->id)->update($request->all());
        return response()->json(['status' => 200]);
    }

    public function color_code_delete(Request $request)
    {
        ColorCode::whereId($request->id)->delete();
        return response()->json(['status' => 200]);
    }
}
