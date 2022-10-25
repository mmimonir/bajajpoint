<?php

namespace App\Http\Controllers\Showroom;

use App\Http\Controllers\Controller;
use App\Models\Showroom\Purchage;

class TRController extends Controller
{
    public function index()
    {
        return view('dms.showroom.tr.tr_status');
    }

    public function tr_pending_index()
    {
        return view('dms.showroom.tr.tr_pending');
    }

    public function tr_pending()
    {
        $tr_data = Purchage::rightJoin('cores', 'cores.store_id', '=', 'purchages.id')
            ->rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('mrps', 'mrps.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.print_code',
                'cores.vendor_name',
                'cores.five_chassis',
                'cores.five_engine',
                'mrps.tr',
                'vehicles.model',
                'purchages.purchage_date',
                'purchages.vendor',
                'cores.whos_vat',
                'cores.vat_process',
                'cores.original_sale_date',
                'cores.rg_number',
                'cores.evl_invoice_no',
            )
            ->where('cores.vat_process', '=', 'PENDING')->get();

        return response()->json([
            'status' => 2000,
            'tr_data' => $tr_data,
        ]);
    }

    public function tr_status()
    {
        $tr_data = Purchage::rightJoin('cores', 'cores.store_id', '=', 'purchages.id')
            ->rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('mrps', 'mrps.model_code', '=', 'cores.model_code')
            ->select(
                'cores.id',
                'cores.print_code',
                'cores.vendor_name',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.tr_month_code',
                'mrps.tr',
                'vehicles.model',
                'purchages.purchage_date',
                'purchages.vendor',
                'cores.whos_vat',
                'cores.vat_process',
                'cores.original_sale_date',
                'cores.rg_number',
                'cores.evl_invoice_no',
            )
            ->where('cores.tr_month_code', '!=', 'NOCODE')->get();

        return response()->json([
            'status' => 200,
            'tr_data' => $tr_data,
        ]);
    }
}
