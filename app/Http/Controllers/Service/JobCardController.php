<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Models\Service\SparePartsStock;

use App\Models\Showroom\Vehicle;
use App\Http\Controllers\Controller;
use App\Models\Service\JobCard;
use App\Models\Service\Mechanic;
use Carbon\Carbon;

class JobCardController extends Controller
{
    public function load_job_card_view()
    {
        return view('service.job_card');
    }
    public function create_job_card(Request $request)
    {
        return response()->json(['data' => $request->all()]);
    }
    public function load_basic_data()
    {
        $all_vehicle = Vehicle::select('model', 'model_code')->get();
        return response()->json(['vehicle' => $all_vehicle]);
    }
    public function search_by_part_id(Request $request)
    {
        $part_id = $request->part_id;
        $data = SparePartsStock::select('part_id as value', 'id')->where('part_id', 'LIKE', '%' . $part_id . '%')->get();
        return response()->json($data);
    }
    public function search_by_full_part_id(Request $request)
    {
        $part_id = $request->part_id;
        $data = SparePartsStock::select('part_id', 'id', 'part_name', 'rate')->where(['part_id' => $part_id])->first();
        return response()->json($data);
    }
    public function assign_job_card_sl_no(Request $request)
    {
        // $last_job_caard_no = JobCard::select('job_card_no')->where('job_card_date', Carbon::now()->toDateString())->first();
        $last_job_caard_no = JobCard::select('job_card_no')
            ->where('job_card_date', Carbon::now()->toDateString())
            ->orderBy('job_card_no', 'desc')
            ->first();
        // dd($last_job_caard_no->job_card_no);

        $new_job_card_no = 0;
        if ($last_job_caard_no) {
            $new_job_card_no = 'JB-' . ($last_job_caard_no->job_card_no + 1);
        } else {
            $new_job_card_no = "JB-" . 1;
        }
        // dd($new_job_card_no);
        return response()->json($new_job_card_no);
    }
    public function load_employee_data()
    {
        $all_employee = Mechanic::select('id', 'name')->get();
        return response()->json(['employee' => $all_employee]);
    }
}
