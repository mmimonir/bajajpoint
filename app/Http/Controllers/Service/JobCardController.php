<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Models\Service\SparePartsStock;

use App\Models\Showroom\Vehicle;
use App\Http\Controllers\Controller;
use App\Models\Service\JobCard;
use App\Models\Service\Mechanic;
use App\Models\Service\ServiceCustomer;
use Carbon\Carbon;

class JobCardController extends Controller
{
    public function load_job_card_view()
    {
        return view('service.job_card');
    }

    public function customer_name_already_exists(Request $request, $mobile = null)
    {
        $customer_mobile = $request->mobile;
        if ($mobile != null) {
            $customer_mobile = $mobile;
        }
        $customer_data = ServiceCustomer::select('*')
            ->where('mobile', $customer_mobile)->first();
        if ($mobile && $customer_data) {
            return $customer_data->id;
        }
        if ($customer_data) {
            return response()
                ->json(
                    [
                        'message' => 'Customer already exists.',
                        'data' => $customer_data,
                        'status' => 'success'
                    ]
                );
        }
    }

    public function create_job_card(Request $request)
    {
        $customer_id = $this->customer_name_already_exists($request, $request->mobile);
        if (!$customer_id) {
            $id = ServiceCustomer::create([
                'client_name' => $request->client_name,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'email' => $request->email,
            ])->id;
            dd($id);
        }
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
        $data = SparePartsStock::select('part_id', 'id', 'part_name', 'rate', 'stock_quantity')->where(['part_id' => $part_id])->first();
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
