<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\ColorCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function get_single_color(Request $request)
    {
        $color_data = ColorCode::find($request->id);
        return response()->json($color_data);
    }

    public function color_code_add(Request $request)
    {
        ColorCode::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Color Code Added Successfully'
        ]);
    }

    public function color_code_update(Request $request)
    {
        // dd($request->all());
        ColorCode::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Color Code Updated Successfully'
        ]);
    }

    public function color_code_delete(Request $request)
    {
        ColorCode::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Color Code Deleted Successfully'
        ]);
    }
}
