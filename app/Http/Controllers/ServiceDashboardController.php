<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceDashboardController extends Controller
{
    public function index()
    {
        return view('service_dashboard');
    }
}
