<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('dms.supplier.supplier');
    }

    public function supplier_get()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    public function supplier_add(Request $request)
    {
        Supplier::create($request->all());
        return response()->json([
            'status' => 200,
        ]);
    }

    public function supplier_update(Request $request)
    {
        // dd($request->all());
        Supplier::whereId($request->id)->update($request->all());
        return response()->json(['status' => 200]);
    }

    public function supplier_delete(Request $request)
    {
        Supplier::whereId($request->id)->delete();
        return response()->json(['status' => 200]);
    }
}
