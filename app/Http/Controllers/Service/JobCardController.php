<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Service\JobCardService;
use App\Models\Service\{Bill, JobCard, ServiceCustomer, SparePartsSale, SparePartsStock};
use Maatwebsite\Excel\Transactions\TransactionHandler;

class JobCardController extends Controller
{
    public $job_card_no = 0;

    public function load_single_job_card(Request $request)
    {
        $single_jb_details = JobCard::select('*')
            ->where([
                'id' => $request->id,
            ])
            ->first();
        // fetch service customer details based on job card customer id
        $service_customer_id = $single_jb_details->customer_id;
        $service_customer_details = ServiceCustomer::select('*')
            ->where('id', $service_customer_id)
            ->first();
        // fetch spare parts sale details based on job card no
        $spare_parts_sale_details = SparePartsSale::rightJoin(
            'spare_parts_stocks',
            'spare_parts_stocks.part_id',
            '=',
            'spare_parts_sales.part_id'
        )
            ->select(
                'spare_parts_stocks.*',
                'spare_parts_sales.*'
            )
            ->where([
                'spare_parts_sales.job_card_id' => $request->id,
            ])
            ->get();

        return response()->json([
            'single_jb_details' => $single_jb_details,
            'service_customer_details' => $service_customer_details,
            'spare_parts_sale_details' => $spare_parts_sale_details,
        ]);
    }

    public function load_job_card_list(Request $request): \Illuminate\Http\JsonResponse
    {
        $job_card_list = JobCard::select('job_card_no', 'id')
            ->where('job_card_date', $request->jb_date ?? Carbon::now()->toDateString())
            ->orderBy('job_card_no', 'asc')
            ->get();
        return response()->json(['job_card_list' => $job_card_list]);
    }

    // Create or update item on spare parts sale table based on job card id and jb date
    public function create_or_update(Request $request): \Illuminate\Http\JsonResponse
    {
        $bill_no = $request->bill_no;
        if ($request->request_from == 'job_card_page') {
            $bill_no = JobCardService::create_bill_no();
        } elseif ($request->bill_no) {
            $bill_no = $request->bill_no;
        }
        $data = SparePartsSale::updateOrCreate([
            'part_id' => $request->part_id,
            'sale_date' => $request->job_card_date,
            'request_from' => $request->request_from,
            'bill_no' => $bill_no,
        ], [
            'job_card_id' => $request->job_card_id ?? 0,
            'customer_id' => $request->customer_id ?? 0,
            'part_id' => $request->part_id,
            'sale_date' => $request->job_card_date,
            'quantity' => $request->quantity,
            'sale_rate' => $request->sale_rate,
            'job_card_no' => $request->job_card_no ?? 0,
            'bill_no' => $bill_no ?? 0,
            'request_from' => $request->request_from ?? 'none',
        ]);

        return response()->json($data);
    }

    public function delete_parts_item(Request $request)
    {
        SparePartsSale::where('id', $request->id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }

    public function load_job_card_view()
    {
        return view('dms.service.job_card.job_card');
    }

    public function create_bill_no()
    {
        $bill_no = JobCardService::create_bill_no();

        return $bill_no;
    }
    public function check_jb_is_exists($jb_date, $customer_id)
    {
        $jb_data = JobCard::where(['job_card_date' => $jb_date, 'customer_id' => $customer_id])->first();
        if ($jb_data) {
            return $jb_data->job_card_no;
        } else {
            return false;
        }
    }

    public function customer_name_already_exists(Request $request)
    {   // check if customer name already exists in service customer table with id
        $service_customer_data =  JobCardService::service_customer_data($request);

        // check if customer name already exists in showroom core table without id
        $showroom_customer_data =  JobCardService::showroom_customer_data($request);
        $exists_jb_no = $this->check_jb_is_exists(Carbon::now()->toDateString(), $service_customer_data->id ?? '');

        if ($service_customer_data) {
            return response()
                ->json(
                    [
                        'message' => 'Customer already exists.',
                        'service_data' => $service_customer_data,
                        'status' => 'service',
                        'job_card_no' => $exists_jb_no ?? '',
                    ]
                );
        } else {
            if ($showroom_customer_data) {
                return response()
                    ->json(
                        [
                            'message' => 'Customer already exists.',
                            'showroom_data' => $showroom_customer_data,
                            'status' => 'showroom',
                            'job_card_no' => $exists_jb_no ?? '',
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
    {   // check rg number is provided, otherwise is set to on test automatically
        $rg_number = $request->rg_number;
        if ($rg_number == null) {
            $rg_number = 'On-Test';
        }

        // check the customer is buy mc from our showroom or not, if yes our_customer set to yes.
        $our_customer =  JobCardService::showroom_customer_data($request);
        if ($our_customer) {
            $our_customer = 'yes';
        } else {
            $our_customer = 'no';
        }
        $customer_id = 0;

        // create customer if not exists and assign customer id to variable
        if ($request->service_customer_id == null) {
            $customer_data = ServiceCustomer::create([
                'client_name' => $request->client_name,
                'client_mobile' => $request->client_mobile,
                'client_address' => $request->client_address,
                'client_email' => $request->client_email,
            ]);
            $customer_id = $customer_data->id;
        } else {
            $id = ServiceCustomer::updateOrCreate([
                'id' => $request->service_customer_id
            ], [
                'client_name' => $request->client_name,
                'client_mobile' => $request->client_mobile,
                'client_address' => $request->client_address,
                'client_email' => $request->client_email,
            ])->id;
            $customer_id = $id;
        }
        // check jb is created or not, if yes then update jb else create jb
        // create job card TODO: added bill id later, Our Customer?
        $jb_id = JobCard::updateOrCreate([
            'customer_id' => $customer_id,
            // 'job_card_no' => $request->job_card_no,
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
            'mc_delivery_done' => 'pending',
            'recomend_our_service_center' => $request->recomend_our_service_center,
            'customer_suggestion' => $request->customer_suggestion,
            'completed_last_service_type' => $request->service_type,
            'paid_service_charge' => $request->paid_service_charge,
            'our_customer' => $our_customer,
            'vat' => $request->vat,
            'advance' => $request->advance_top,
        ])->id;

        // Update service customer table for last completed service
        ServiceCustomer::where('id', $customer_id)->update(['completed_last_service_type' => $request->service_type]);
        return response()->json([
            'message' => 'Job card created successfully.',
            'status' => 200,
            'service_customer_id' => $customer_id,
        ]);

        return response()->json([
            'message' => 'Job card created successfully.',
            'status' => 200,
            'service_customer_id' => $customer_id,
        ]);
    }

    public function load_basic_data()
    {
        $all_vehicle =  JobCardService::load_basic_data();
        return response()->json(['vehicle' => $all_vehicle]);
    }

    public function search_by_part_id(Request $request)
    {
        $data =  JobCardService::search_by_part_id($request);
        return response()->json($data);
    }

    public function search_by_full_part_id(Request $request)
    {
        $data =  JobCardService::search_by_full_part_id($request);
        return response()->json($data);
    }

    public function assign_job_card_sl_no()
    {
        $last_job_caard_no =  JobCardService::assign_job_card_sl_no();

        $new_job_card_no = 0;
        if ($last_job_caard_no) {
            $new_job_card_no = $last_job_caard_no->job_card_no + 1;
        } else {
            $new_job_card_no = 1;
        }

        $this->job_card_no = $new_job_card_no;
        return response()->json($new_job_card_no);
    }
    public function assign_bill_no()
    {
        $bill_no =  JobCardService::create_bill_no();
        return response()->json($bill_no);
    }

    public function load_employee_data()
    {
        $all_employee =  JobCardService::load_employee_data();
        return response()->json(['employee' => $all_employee]);
    }

    public static function delivery_done(Request $request)
    {
        // return response()->json($request->client_name);
        try {
            DB::transaction(function () use ($request) {
                function stock_adjust($request)
                {
                    foreach ($request->part_id as $key => $value) {
                        if ($request->part_id[$key] != null) {
                            SparePartsStock::where(
                                'part_id',
                                $request->part_id[$key]
                            )->decrement('stock_quantity', $request->quantity[$key]);
                        }
                    }
                }
                // Update JobCard Table when request from Create Job Card Page
                if ($request->job_card_id) {
                    JobCard::where('id', $request->job_card_id)->update(['mc_delivery_done' => 'yes']);
                };

                // Update SparePartsStock Table when request from Create Job Card, Create Bill Page.
                if ($request->part_id && $request->request_from == 'job_card_page') {
                    stock_adjust($request);
                }
                if ($request->part_id && $request->request_from == 'bill_page' && $request->update == 'true') {
                    stock_adjust($request);
                }
                if ($request->part_id) {
                    // Generate bill no
                    $bill_no = 0;
                    if ($request->bill_no) {
                        $bill_no = $request->bill_no;
                    } else {
                        $bill_no = JobCardService::create_bill_no();
                    }

                    // Cacluate total bill amount
                    $total_bill = 0;
                    foreach ($request->part_id as $key => $value) {
                        if ($request->part_id[$key] != null) {
                            $total_bill += $request->quantity[$key] * $request->rate[$key];
                        }
                    }
                    // Calculate profit amount
                    $profit = ($total_bill * 0.2) - $request->discount ?? 0;

                    // Create Bill when request from Create Job Card, Create Bill Page and return bill_id.
                    // $bill_id = Bill::create([
                    $bill_id = Bill::updateOrCreate(
                        [
                            'bill_no' => $request->bill_no,
                            'bill_date' => $request->bill_date
                        ],
                        [
                            'bill_no' => $bill_no,
                            'bill_date' => $request->bill_date,
                            'bill_amount' => $total_bill + $request->paid_service_charge ?? 0,
                            'discount' => $request->discount ?? 0,
                            'due_amount' => $request->due_amount ?? 0,
                            'profit' => $profit + $request->paid_service_charge ?? 0,
                            'vat' => $request->vat ?? 0,
                            'service_customer_id' => $request->service_customer_id ?? 0,
                            'job_card_id' => $request->job_card_id ?? 0,
                            'request_from' => $request->request_from ?? 0,
                            'client_name' => $request->client_name ?? 0,
                            'client_address' => $request->client_address ?? 0,
                            'client_mobile' => $request->client_mobile ?? 0,
                        ]
                    )->id;

                    // Update bill id in Other Table
                    if ($bill_id) {
                        // Update bill id in JobCard, Spare Parts Table when request from Create JobCard Page.
                        if ($request->job_card_id) {
                            JobCard::where('id', $request->job_card_id)->update(['bill_id' => $bill_id]);
                            SparePartsSale::where('job_card_id', $request->job_card_id)->update(['bill_id' => $bill_id]);
                        }
                        // Update bill id in Spare Parts Table when request from Create Bill Page.
                        if ($request->bill_no) {
                            SparePartsSale::where([
                                'bill_no' => $request->bill_no,
                                'sale_date' => $request->bill_date,
                            ])->update(['bill_id' => $bill_id]);
                        }
                    }
                }
            });
            return response()->json([
                'message' => 'Operation completed successfully.',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
}
