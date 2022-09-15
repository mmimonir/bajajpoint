<?php

namespace App\Http\Controllers\VAT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Showroom\Core;
use Illuminate\Support\Facades\DB;

class VATPurchageAccountController extends Controller
{
    public function vat_purchage_homepage(Request $request)
    {
        $vat_data = $this->vat_sale_by_model();
        // return response()->json($vat_data);
        return view('dms.vat.vat_purchage_account')->with('vat_data', $vat_data);
    }
    public function vat_sale_by_model()
    {
        // $vat_code = $request->vat_code;
        // $start_date = $request->start_date;
        // $end_date = $request->end_date;
        $vat_code = '2000';
        $start_date = '2022-05-01';
        $end_date = '2022-06-30';

        $data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.customer_name',
                'cores.model_code',
                'cores.full_address',
                'cores.vat_code',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.vat_sale_date',
                'cores.sale_mushak_no',
                'cores.basic_price_vat',
                'cores.sale_vat',
                'cores.unit_price_vat',
                'vehicles.model',
                'cores.uml_mushak_no',
                'cores.uml_mushak_no',
                'cores.mushak_date',
                DB::raw('MONTH(cores.mushak_date) as month'),
                DB::raw('1 as quantity')
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereBetween('cores.mushak_date', [$start_date, $end_date])
            // ->whereBetween('cores.vat_sale_date', [$start_date, $end_date])
            ->orderBy('cores.uml_mushak_no', 'asc')
            ->get()
            ->groupBy(['model', 'month', 'uml_mushak_no']);



        // dd($data);
        return $data;

        return view('dms.html_print.vat.vat_sale_by_model')->with(['vat_data' => $data, 'vat_code' => $vat_code]);
    }
}
