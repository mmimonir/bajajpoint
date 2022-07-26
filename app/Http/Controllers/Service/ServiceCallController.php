<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Showroom\Core;
use Illuminate\Http\Request;

class ServiceCallController extends Controller
{
    public function service_call_list_view()
    {
        return view('dms.service.call_list.service_call_list');
    }

    public function get_call_result(Request $request)
    {
        $call_result = Core::select('*')->where('original_sale_date', $request->expexted_date)->get();
        return response()->json($call_result);
    }
}
