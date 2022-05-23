<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceDashboardController extends Controller
{
    public function index()
    {
        return view('service_dashboard');
    }
    public function load_job_card_view()
    {
        return view('service.job_card');
    }
}
