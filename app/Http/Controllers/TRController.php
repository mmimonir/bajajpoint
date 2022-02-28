<?php

namespace App\Http\Controllers;

use App\Models\Core;
use App\Models\Purchage;
use Illuminate\Http\Request;

class TRController extends Controller
{
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


        return view('dms.tr.tr_pending')->with(['tr_data' => $tr_data]);
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
        return view('dms.tr.tr_status')->with(['tr_data' => $tr_data]);
    }
}
