<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\ServiceCall;
use App\Models\Showroom\Core;
use App\Models\Showroom\Vehicle;
use Illuminate\Http\Request;

class ServiceCallController extends Controller
{
    public function service_call_list_view()
    {
        return view('dms.service.call_list.service_call_list');
    }

    public function get_call_result(Request $request)
    {
        try {
            $call_result = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
                ->rightJoin('service_calls', 'service_calls.core_customer_id', '=', 'cores.id')
                ->select(
                    'cores.id',
                    'cores.customer_name',
                    'cores.sale_date',
                    'cores.address_two',
                    'cores.mobile',
                    'cores.rg_number',
                    'cores.model_code',
                    'vehicles.model',
                    'service_calls.note',
                )
                ->where('cores.sale_date', $request->expexted_date)->get();

            return response()->json($call_result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function save_service_note(Request $request)
    {
        try {
            $service_note = ServiceCall::updateOrCreate(
                ['core_customer_id' => $request->core_customer_id],
                [
                    'note' => $request->note,
                ]
            );

            return response()->json([
                'success' => 'Service note saved successfully.',
                'note' => $service_note,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
