<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom\Core;

class HTMLPrintController extends Controller
{
    public function full_hform()
    {
        return view('dms.html_print.brta.hform_full');
    }
    public function full_hform_get_data(Request $request)
    {
        $hform_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('color_codes', 'color_codes.color_code', '=', 'cores.color_code')
            ->select(
                'cores.customer_name',
                'cores.father_name',
            )
            ->where('cores.id', $request->id)
            ->first();
    }
}
