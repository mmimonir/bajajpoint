<?php

namespace App\Http\Controllers\Showroom;

use App\Http\Controllers\Controller;
use App\Models\Showroom\Core;
use Illuminate\Http\Request;

class CKDController extends Controller
{
    public function ckd_pending()
    {
        $ckd_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->rightJoin('purchages', 'purchages.id', '=', 'cores.store_id')
            ->select(
                'cores.id',
                'cores.vendor_name',
                // 'cores.model',
                'cores.ckd_process',
                'cores.approval_no',
                'cores.invoice_no',
                'cores.three_chassis',
                'cores.five_chassis',
                'cores.five_engine',
                'vehicles.model',
                'purchages.purchage_date',
                'cores.original_sale_date',
                'cores.rg_number',
                'cores.evl_invoice_no',
            )
            ->where('cores.ckd_process', '=', 'PENDING')->get();
        // ->whereNull('cores.evl_invoice_no')->get();

        return view('dms.showroom.ckd.ckd_pending')->with(['ckd_data' => $ckd_data]);
    }

    public function ckd_update(Request $request)
    {
        try {
            $ckd_data = Core::find($request->id);
            $ckd_data->ckd_process = 'OK';
            $ckd_data->approval_no = $request->approval_no;
            $ckd_data->invoice_no = $request->invoice_no;
            $ckd_data->save();

            return response()->json(['success' => 'Data is successfully updated', 'status' => 200, 'id' => $request->id]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
}
