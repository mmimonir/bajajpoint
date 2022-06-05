<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use App\Models\Service\Bill;
use Illuminate\Http\Request;
use App\Models\Service\JobCard;
use App\Models\Service\Mechanic;
use App\Models\Showroom\Vehicle;
use App\Http\Controllers\Controller;
use App\Models\Service\SparePartsSale;
use App\Models\Service\ServiceCustomer;
use App\Models\Service\SparePartsStock;

class JobCardController extends Controller
{
    public $job_card_no = 0;
    public function load_job_card_view()
    {
        return view('service.job_card');
    }
    public function create_bill_no()
    {
        $bill_no = Bill::select('bill_no')->orderBy('id', 'desc')->first();
        if ($bill_no) {
            $bill_no = $bill_no->bill_no;
            $bill_no++;
        } else {
            $bill_no = 1;
        }
        return $bill_no;
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
        // dd($request->all());
        // check if customer already exists, if exists then return customer id
        $customer_id = $this->customer_name_already_exists($request, $request->mobile);
        // create customer if not exists and reassign customer id to variable
        if (!$customer_id) {
            $id = ServiceCustomer::create([
                'client_name' => $request->client_name,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'email' => $request->email,
            ])->id;
            $customer_id = $id;
        }
        // create job card TODO: added bill id later, Our Customer?
        $jb_id = JobCard::create([
            'job_card_no' => $request->job_card_no,
            'job_card_date' => $request->job_card_date,
            'customer_id' => $customer_id,
            'service_engineer_id' => $request->service_engineer_id,
            'mechanic_id' => $request->mechanic_id,
            'rg_number' => $request->rg_number,
            'model_code' => $request->model_code,
            'mc_sale_date' => $request->mc_sale_date,
            'mileage' => $request->mileage,
            'chassis_no' => $request->chassis_no,
            'engine_no' => $request->engine_no,
            'service_type' => $request->service_type,
            'work_type' => $request->work_type,
            'customer_complain' => $request->customer_complain,
            'repair_description' => $request->repair_description,
            'next_work_description' => $request->next_work_description,
            'next_work_date' => $request->next_work_date,
            'amount_of_fuel' => $request->amount_of_fuel,
            'any_scratch_in_tank' => $request->any_scratch_in_tank,
            'indicator_is_broken' => $request->indicator_is_broken,
            'any_scratch_in_headlight' => $request->any_scratch_in_headlight,
            'stuff_behavior' => $request->stuff_behavior,
            'service_center_is_clean' => $request->service_center_is_clean,
            'garir_sompadito_kaj' => $request->garir_sompadito_kaj,
            'mc_problem_solved' => $request->mc_problem_solved,
            'mc_delivery_done' => $request->mc_delivery_done,
            'recomend_our_service_center' => $request->recomend_our_service_center,
            'customer_suggestion' => $request->customer_suggestion,
            'completed_last_service_type' => $request->service_type,
            'paid_service_charge' => $request->paid_service_charge,
            'vat' => $request->vat,
        ])->id;
        // if job card has parts sale then create spare parts sale #TODO add bill id later
        // foreach ($request->part_id as $key => $value) {
        //     if ($request->part_id[$key] != null) {
        //         SparePartsSale::create([
        //             'part_id' => $request->part_id[$key],
        //             'customer_id' => $customer_id,
        //             'quantity' => $request->quantity[$key],
        //             'sale_rate' => $request->sale_rate[$key],
        //             'sale_date' => $request->job_card_date,
        //         ]);
        //     }
        // }
        // generate bill no
        // $bill_no = $this->create_bill_no();
        // if jb has parts or mobil then create bill #TODO add job card id later
        // $total_bill = 0;
        // foreach ($request->part_id as $key => $value) {
        //     if ($request->part_id[$key] != null) {
        //         $total_bill += $request->quantity[$key] * $request->sale_rate[$key];
        //     }
        // }
        // $profit = ($total_bill * 0.2) - $request->discount;
        // $bill_id = Bill::create([
        //     'bill_no' => $bill_no,
        //     'bill_amount' => $total_bill + $request->paid_service_charge,
        //     'discount' => $request->discount,
        //     'due_amount' => $request->due_amount,
        //     'profit' => $profit + $request->paid_service_charge,
        //     'vat' => $request->vat,
        //     'service_customer_id' => $customer_id,
        // ])->id;


        return response()->json(['data' => $jb_id]);
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
            $new_job_card_no = $last_job_caard_no->job_card_no + 1;
        } else {
            $new_job_card_no = 1;
        }
        // dd($new_job_card_no);
        $this->job_card_no = $new_job_card_no;
        return response()->json($new_job_card_no);
    }

    public function load_employee_data()
    {
        $all_employee = Mechanic::select('id', 'name')->get();
        return response()->json(['employee' => $all_employee]);
    }
}
