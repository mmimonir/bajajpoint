<?php

namespace App\Services\Service;

use App\Models\Service\Bill;
use App\Models\Service\Employee;
use App\Models\Service\JobCard;
use App\Models\Service\ServiceCustomer;
use App\Models\Service\SparePartsStock;
use App\Models\Showroom\Core;
use App\Models\Showroom\Vehicle;
use Carbon\Carbon;

class JobCardService
{
    public static function create_bill_no()
    {
        $bill_no = 0;

        $today = Carbon::now()->toDateString();
        $today_month = Carbon::now()->format('m');
        $today_day = Carbon::now()->format('d');

        if ($today_month == '07' && $today_day == '01') {
            $bill_data = Bill::select('bill_no')
                ->where('bill_date', $today)
                ->orderBy('bill_no', 'desc')
                ->first();
            if ($bill_data) {
                $bill_no = $bill_data->bill_no + 1;
            } else {
                $bill_no = 1;
            }
        } else {
            $bill_data = Bill::select('bill_no')
                ->orderBy('created_at', 'desc')
                ->first();
            if ($bill_data) {
                $bill_no = $bill_data->bill_no + 1;
            } else {
                $bill_no = 1;
            }
        }

        return $bill_no;
    }
    // don't delete this function
    // public static function create_bill_no()
    // {
    //     $bill_data = Bill::select('bill_no', 'bill_date')
    //         ->orderBy('bill_no', 'desc')
    //         ->first();
    //     $bill_no = $bill_data->bill_no;

    //     if ($bill_no) {
    //         $bill_no = $bill_data->bill_no;
    //         $bill_no++;
    //     } else {
    //         $bill_no = 1;
    //     }
    //     return $bill_no;
    // }

    public static function assign_job_card_sl_no()
    {
        $last_job_caard_no = JobCard::select('job_card_no')
            ->where('job_card_date', Carbon::now()->toDateString())
            ->orderBy('job_card_no', 'desc')
            ->first();

        return $last_job_caard_no;
    }

    public static function load_employee_data()
    {
        $all_employee = Employee::select('id', 'name')->get();

        return $all_employee;
    }

    public static function service_customer_data($request)
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
                'service_customers.client_mobile',
                'service_customers.client_address',
                'service_customers.id',
                'vehicles.model',
            )
            ->where('client_mobile', $request->mobile)
            ->first();

        return $service_customer_data;
    }

    public static function showroom_customer_data($request)
    {
        $showroom_customer_data = Core::rightJoin(
            'vehicles',
            'vehicles.model_code',
            '=',
            'cores.model_code'
        )
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
            ->where('cores.mobile', '=', $request->mobile)
            ->first();

        return $showroom_customer_data;
    }

    public static function load_basic_data()
    {
        $all_vehicle = Vehicle::select('model', 'model_code')->get();

        return $all_vehicle;
    }

    public static function search_by_part_id($request)
    {
        if ($request->has('part_id')) {
            $part_id = $request->part_id;
            $data = SparePartsStock::select('part_id as value', 'id')
                ->where('part_id', 'LIKE', '%'.$part_id.'%')->get();

            return $data;
        }
    }

    public static function search_by_full_part_id($request)
    {
        $part_id = $request->part_id;
        $data = SparePartsStock::select(
            'part_id',
            'id',
            'part_name',
            'rate',
            'stock_quantity'
        )->where(['part_id' => $part_id])->first();

        return $data;
    }
}
