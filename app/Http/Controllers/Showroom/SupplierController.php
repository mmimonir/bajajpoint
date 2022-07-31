<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\Supplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SupplierController extends Controller
{
    public function index()
    {
        return view('dms.showroom.supplier.supplier');
    }

    public function supplier_get()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    public function get_single_supplier(Request $request)
    {
        $supplier = Supplier::find($request->id);
        return response()->json($supplier);
    }

    public function supplier_add(Request $request)
    {
        Supplier::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Supplier added successfully.'
        ]);
    }

    public function supplier_update(Request $request)
    {
        Supplier::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Supplier updated successfully.'
        ]);
    }

    public function supplier_delete(Request $request)
    {
        Supplier::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Supplier deleted successfully.'
        ]);
    }
}
