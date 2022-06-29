<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Service\JobCardService;
use App\Models\Service\{JobCard, ServiceCustomer, SparePartsSale};

class JobCardController extends Controller
{
    public $job_card_no = 0;

    public function __construct()
    {
        $this->job_card_service = new JobCardService;
    }

    public function load_single_job_card(Request $request)
    {
        $single_jb_details = JobCard::select('*')
            ->where([
                'job_card_no' => $request->job_card_no,
                'job_card_date' => Carbon::now()->toDateString()
            ])
            ->first();
        // fetch service customer details based on job card customer id
        $service_customer_id = $single_jb_details->customer_id;
        $service_customer_details = ServiceCustomer::select('*')
            ->where('id', $service_customer_id)
            ->first();
        // fetch spare parts sale details based on job card no
        $spare_parts_sale_details = SparePartsSale::rightJoin('spare_parts_stocks', 'spare_parts_stocks.part_id', '=', 'spare_parts_sales.part_id')
            ->select(
                'spare_parts_stocks.*',
                'spare_parts_sales.*'
            )
            ->where([
                'spare_parts_sales.job_card_no' => $request->job_card_no,
                'spare_parts_sales.sale_date' => Carbon::now()->toDateString()
            ])
            ->get();

        return response()->json([
            'single_jb_details' => $single_jb_details,
            'service_customer_details' => $service_customer_details,
            'spare_parts_sale_details' => $spare_parts_sale_details,
        ]);
    }

    public function load_job_card_list(): \Illuminate\Http\JsonResponse
    {
        $job_card_list = JobCard::select('job_card_no')
            ->where('job_card_date', Carbon::now()->toDateString())
            ->orderBy('job_card_no', 'asc')
            ->get();
        return response()->json(['job_card_list' => $job_card_list]);
    }

    // Create or update item on spare parts sale table based on job card id and jb date
    public function create_or_update(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = SparePartsSale::updateOrCreate([
            'part_id' => $request->part_id,
            'sale_date' => $request->job_card_date,
        ], [
            // 'job_card_id' => $request->job_card_id,
            'part_id' => $request->part_id,
            'sale_date' => $request->job_card_date,
            'quantity' => $request->quantity,
            'sale_rate' => $request->sale_rate,
            'job_card_no' => $request->job_card_no,
        ]);
        return response()->json($data);
    }

    public function delete_parts_item(Request $request)
    {
        SparePartsSale::where('part_id', $request->part_id)->where('sale_date', $request->sale_date)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully'
        ]);
    }

    public function load_job_card_view()
    {
        return view('service.job_card');
    }

    public function create_bill_no()
    {
        $bill_no = $this->job_card_service->create_bill_no();

        return $bill_no;
    }

    public function customer_name_already_exists(Request $request)
    {
        $service_customer_data = $this->job_card_service->service_customer_data($request);
        $showroom_customer_data = $this->job_card_service->showroom_customer_data($request);

        if ($service_customer_data) {
            return response()
                ->json(
                    [
                        'message' => 'Customer already exists.',
                        'service_data' => $service_customer_data,
                        'status' => 'service'
                    ]
                );
        } else {
            if ($showroom_customer_data) {
                return response()
                    ->json(
                        [
                            'message' => 'Customer already exists.',
                            'showroom_data' => $showroom_customer_data,
                            'status' => 'showroom'
                        ]
                    );
            } else {
                return response()
                    ->json(
                        [
                            'message' => 'Customer does not exists.',
                            'status' => 404
                        ]
                    );
            }
        }
    }

    public function create_job_card(Request $request)
    {
        $rg_number = $request->rg_number;
        if ($rg_number == null) {
            $rg_number = 'On-Test';
        }
        // check the customer is buy mc from our showroom or not
        $our_customer = $this->job_card_service->showroom_customer_data($request);
        if ($our_customer) {
            $our_customer = 'yes';
        } else {
            $our_customer = 'no';
        }
        $customer_id = 0;
        // check if customer already exists, if exists then return customer id
        // $customer_data = ServiceCustomer::select('*')->where('mobile', $request->mobile)->first();
        // if ($customer_data) {
        //     $customer_id = $customer_data->id;
        // }

        // create customer if not exists and reassign customer id to variable

        $id = ServiceCustomer::updateOrCreate([
            'id' => $request->service_customer_id
        ], [
            'client_name' => $request->client_name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'email' => $request->email,
        ])->id;
        $customer_id = $id;


        // return response()->json($customer_id);
        // create job card TODO: added bill id later, Our Customer?
        $jb_id = JobCard::updateOrCreate([
            'job_card_no' => $request->job_card_no,
            'job_card_date' => $request->job_card_date,
        ], [
            'job_card_no' => $request->job_card_no,
            'job_card_date' => $request->job_card_date,
            'customer_id' => $customer_id,
            'service_engineer_id' => $request->service_engineer_id,
            'mechanic_id' => $request->mechanic_id,
            'rg_number' => $rg_number,
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
            'our_customer' => $our_customer,
            'vat' => $request->vat,
        ])->id;
        // $jb_id = JobCard::create([
        //     'job_card_no' => $request->job_card_no,
        //     'job_card_date' => $request->job_card_date,
        //     'customer_id' => $customer_id,
        //     'service_engineer_id' => $request->service_engineer_id,
        //     'mechanic_id' => $request->mechanic_id,
        //     'rg_number' => $rg_number,
        //     'model_code' => $request->model_code,
        //     'mc_sale_date' => $request->mc_sale_date,
        //     'mileage' => $request->mileage,
        //     'chassis_no' => $request->chassis_no,
        //     'engine_no' => $request->engine_no,
        //     'service_type' => $request->service_type,
        //     'work_type' => $request->work_type,
        //     'customer_complain' => $request->customer_complain,
        //     'repair_description' => $request->repair_description,
        //     'next_work_description' => $request->next_work_description,
        //     'next_work_date' => $request->next_work_date,
        //     'amount_of_fuel' => $request->amount_of_fuel,
        //     'any_scratch_in_tank' => $request->any_scratch_in_tank,
        //     'indicator_is_broken' => $request->indicator_is_broken,
        //     'any_scratch_in_headlight' => $request->any_scratch_in_headlight,
        //     'stuff_behavior' => $request->stuff_behavior,
        //     'service_center_is_clean' => $request->service_center_is_clean,
        //     'garir_sompadito_kaj' => $request->garir_sompadito_kaj,
        //     'mc_problem_solved' => $request->mc_problem_solved,
        //     'mc_delivery_done' => $request->mc_delivery_done,
        //     'recomend_our_service_center' => $request->recomend_our_service_center,
        //     'customer_suggestion' => $request->customer_suggestion,
        //     'completed_last_service_type' => $request->service_type,
        //     'paid_service_charge' => $request->paid_service_charge,
        //     'our_customer' => $our_customer,
        //     'vat' => $request->vat,
        // ])->id;
        // Update service customer table for last completed service
        ServiceCustomer::where('id', $customer_id)->update(['completed_last_service_type' => $request->service_type]);
        return response()->json(['message' => 'Job card created successfully.', 'status' => 200]);
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

        return response()->json(['message' => 'Job card created successfully.', 'status' => 200]);
    }

    public function load_basic_data()
    {
        $all_vehicle = $this->job_card_service->load_basic_data();
        return response()->json(['vehicle' => $all_vehicle]);
    }

    public function search_by_part_id(Request $request)
    {
        $data = $this->job_card_service->search_by_part_id($request);
        return response()->json($data);
    }

    public function search_by_full_part_id(Request $request)
    {
        $data = $this->job_card_service->search_by_full_part_id($request);
        return response()->json($data);
    }

    public function assign_job_card_sl_no()
    {
        $last_job_caard_no = $this->job_card_service->assign_job_card_sl_no();

        $new_job_card_no = 0;
        if ($last_job_caard_no) {
            $new_job_card_no = $last_job_caard_no->job_card_no + 1;
        } else {
            $new_job_card_no = 1;
        }

        $this->job_card_no = $new_job_card_no;
        return response()->json($new_job_card_no);
    }

    public function load_employee_data()
    {
        $all_employee = $this->job_card_service->load_employee_data();
        return response()->json(['employee' => $all_employee]);
    }
}
