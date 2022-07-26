<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceCallController extends Controller
{
    public function service_call_list_view()
    {
        return view('dms.service.call_list.service_call_list');
    }
}
