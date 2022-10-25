<?php

namespace App\Http\Controllers\Showroom;

use App\Exports\CoreExport;
use App\Http\Controllers\Controller;
use App\Models\Showroom\Supplier;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function excel_dashboard()
    {
        $dealer = Supplier::select('dealer_name', 'supplier_code')->whereNotNull('dealer_name')->get();

        return view('dms.excel_dashboard')->with(['dealer' => $dealer]);
    }

    public function service_data(Request $request)
    {
        return (new CoreExport($request->start_date, $request->end_date))->download('service_data.xlsx');
    }
}
