<?php

namespace App\Http\Controllers;

use App\Models\Showroom\Core;
use Illuminate\Http\Request;

class HTMLPrintController extends Controller
{
    public function full_hform()
    {
        return view('dms.html_print.brta.hform_full');
    }

    public function full_hform_get_data(Request $request)
    {
        try {
            $hform_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
                ->rightJoin('color_codes', 'color_codes.color_code', '=', 'cores.color_code')
                ->select(
                    'cores.customer_name',
                    'cores.father_name',
                    'cores.address_one',
                    'cores.address_two',
                    'cores.mobile',
                    'cores.dob',
                    'cores.nationality',
                    'cores.eight_chassis',
                    'cores.one_chassis',
                    'cores.three_chassis',
                    'cores.five_chassis',
                    'cores.six_engine',
                    'cores.five_engine',
                    'cores.year_of_manufacture',
                    'color_codes.color',
                    'vehicles.class_of_vehicle',
                    'vehicles.horse_power',
                    'vehicles.cubic_capacity',
                    'vehicles.unladen_weight',
                    'vehicles.ladan_weight',
                    'vehicles.fuel_used',
                    'vehicles.rpm',
                    'vehicles.seats_inc_driver',
                    'vehicles.wheel_base',
                    'vehicles.size_of_tyre',
                    'vehicles.makers_name',
                    'vehicles.makers_country',
                    'vehicles.type_of_body',
                )
                ->where('cores.id', $request->id)
                ->first();

            return response()->json(['hform_data' => $hform_data]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
