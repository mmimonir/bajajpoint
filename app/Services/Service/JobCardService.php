<?php

namespace App\Services\Service;

use Carbon\Carbon;
use App\Models\Showroom\Core;
use App\Models\Service\{Bill, JobCard, Mechanic, ServiceCustomer, SparePartsStock, SparePartsSale};

class JobCardService
{
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
    public function assign_job_card_sl_no()
    {
        $last_job_caard_no = JobCard::select('job_card_no')
            ->where('job_card_date', Carbon::now()->toDateString())
            ->orderBy('job_card_no', 'desc')
            ->first();

        return $last_job_caard_no;
    }
    public function load_employee_data()
    {
        $all_employee = Mechanic::select('id', 'name')->get();
        return $all_employee;
    }
    public function service_customer_data($request)
    {
        $service_customer_data = ServiceCustomer::rightJoin('job_cards', 'job_cards.customer_id', '=', 'service_customers.id')
            ->rightJoin('vehicles', 'vehicles.model_code', '=', 'job_cards.model_code')
            ->select(
                'job_cards.model_code',
                'job_cards.chassis_no',
                'job_cards.engine_no',
                'job_cards.rg_number',
                'job_cards.mc_sale_date',
                'service_customers.client_name',
                'service_customers.mobile',
                'service_customers.address',
                'vehicles.model',
            )
            ->where('mobile', $request->mobile)
            ->first();
        return $service_customer_data;
    }
    public function showroom_customer_data($request)
    {
        $showroom_customer_data = Core::rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.customer_name',
                'cores.five_chassis',
                'cores.five_engine',
                'cores.mobile',
                'cores.original_sale_date',
                'cores.rg_number',
                'cores.address_two',
                'vehicles.model',
                'vehicles.model_code'
            )
            ->where('cores.mobile', "=", $request->mobile)
            ->first();
        return $showroom_customer_data;
    }
}