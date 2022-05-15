<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Core;
use App\Models\Supplier;
use App\Exports\CoreExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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
