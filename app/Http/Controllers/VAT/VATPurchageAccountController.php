<?php

namespace App\Http\Controllers\VAT;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Showroom\Core;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VATPurchageAccountController extends Controller
{
    public function vat_purchage_homepage(Request $request)
    {
        $purchage_data = $this->get_vat_purchage_data($request);
        $sales_data = $this->get_vat_sale_data($request);
        $closing_quantity = $this->vat_purchage_closing_quantity($request);

        // return response()->json($closing_quantity);
        // return response()->json($purchage_data);

        return view('dms.vat.vat_purchage_account')
            ->with([
                'purchage_data' => $purchage_data,
                'sales_data' => $sales_data,
                'closing_quantity' => $closing_quantity,
                'date_range' => [
                    'from' => '2022-07-01',
                    'to' => '2022-08-31',
                ],
            ]);
    }
    public function vat_purchage_closing_quantity(Request $request)
    {
        $vat_code = $request->vat_code ?? 2000;
        $start_date = '2019-07-01';
        // $end_date = Carbon::parse($request->start_date)->subDays(1)->format('Y-m-d');
        $end_date = '2022-06-30';

        $total_purchage = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.model_code',
                'vehicles.model',
                DB::raw('1 as quantity')
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereBetween('cores.mushak_date', [$start_date, $end_date])
            ->orderBy('vehicles.model', 'asc')
            ->get()
            ->groupBy(['model'])
            ->map(function ($item) {
                return [
                    'quantity' => $item->sum('quantity'),
                    'model_code' => $item->first()->model_code,
                    'model' => $item->first()->model,
                ];
            });

        $total_sale = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.model_code',
                'vehicles.model',
                DB::raw('1 as quantity')
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereBetween('cores.vat_sale_date', [$start_date, $end_date])
            ->orderBy('cores.vat_sale_date', 'asc')
            ->get()
            ->groupBy(['model'])
            ->map(function ($item) {
                return [
                    'quantity' => $item->sum('quantity'),
                    'model_code' => $item->first()->model_code,
                    'model' => $item->first()->model,
                ];
            });

        $closing_balance = $total_purchage->map(function ($item) use ($total_sale) {
            $item['closing_quantity'] = $item['quantity'] - $total_sale[$item['model']]['quantity'];
            $item['purchage_quantity'] = $item['quantity'];
            $item['sale_quantity'] = $total_sale[$item['model']]['quantity'];
            return $item;
        });

        return $closing_balance;
    }
    public function get_vat_purchage_data($request)
    {
        // $vat_code = $request->vat_code;
        // $start_date = $request->start_date;
        // $end_date = $request->end_date;
        $vat_code = '2000';
        $start_date = '2022-07-01';
        $end_date = '2022-08-31';

        $purchage_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.customer_name',
                'cores.nid_no',
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
                'cores.mushak_date',
                DB::raw('MONTH(cores.mushak_date) as month'),
                DB::raw('1 as quantity')
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereBetween('cores.mushak_date', [$start_date, $end_date])
            ->orderBy('cores.uml_mushak_no', 'asc')
            ->get()
            ->groupBy(['model', 'month', 'mushak_date', 'uml_mushak_no']);

        // dd($data);
        return $purchage_data;
    }
    public function get_vat_sale_data($request)
    {
        // $vat_code = $request->vat_code;
        // $start_date = $request->start_date;
        // $end_date = $request->end_date;
        $vat_code = '2000';
        $start_date = '2022-07-01';
        $end_date = '2022-08-31';

        $sale_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.customer_name',
                'cores.nid_no',
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
                'cores.mushak_date',
                DB::raw('MONTH(cores.vat_sale_date) as month'),
                DB::raw('1 as quantity')
            )
            ->where('cores.vat_code', "=", $vat_code)
            ->whereBetween('cores.vat_sale_date', [$start_date, $end_date])
            ->orderBy('cores.sale_mushak_no', 'asc')
            ->get()
            ->groupBy(['model', 'month', 'vat_sale_date']);

        return $sale_data;
    }
}
