<?php

namespace App\Services\Service;

use Carbon\Carbon;
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
}
