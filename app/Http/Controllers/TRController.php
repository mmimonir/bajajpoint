<?php

namespace App\Http\Controllers;

use App\Models\Core;
use Illuminate\Http\Request;

class TRController extends Controller
{
    public function tr_pending()
    {
        $tr_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('purchages', 'purchages.id', '=', 'cores.store_id')
            ->select(
                'cores.id',
                'cores.print_code',
                'cores.vendor_name',
                'cores.vat_process',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.tr_amount',
                'vehicles.model',
                'purchages.purchage_date',
                'cores.original_sale_date',
                'cores.rg_number',
                'cores.evl_invoice_no',
            )
            ->where('cores.vat_process', '=', 'PENDING')->get();
        // ->whereNull('cores.evl_invoice_no')->get();

        return view('dms.tr.tr_pending')->with(['tr_data' => $tr_data]);
    }

    // public function ckd_update(Request $request)
    // {
    //     try {
    //         $ckd_data = Core::find($request->id);
    //         $ckd_data->ckd_process = 'OK';
    //         $ckd_data->approval_no = $request->approval_no;
    //         $ckd_data->invoice_no = $request->invoice_no;
    //         $ckd_data->save();
    //         return response()->json(['success' => 'Data is successfully updated', 'status' => 200, 'id' => $request->id]);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => $e->getMessage(), 'status' => 502]);
    //     }
    // }
}
