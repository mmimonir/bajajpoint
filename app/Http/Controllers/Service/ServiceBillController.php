<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceBillController extends Controller
{
    public function create_bill()
    {
        return view('service.bill.create_bill');
    }
}
