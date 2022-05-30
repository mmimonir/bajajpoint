<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobCardController extends Controller
{
    public function load_job_card_view()
    {
        return view('service.job_card');
    }
    public function create_job_card(Request $request)
    {
        return response()->json(['data' => $request->all()]);
    }
}
