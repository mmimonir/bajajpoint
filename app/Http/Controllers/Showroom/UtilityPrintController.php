<?php

namespace App\Http\Controllers\Showroom;

use App\Http\Controllers\Controller;

class UtilityPrintController extends Controller
{
    public function index()
    {
        return view('dms.showroom.utility.delivery_challan.delivery_challan');
    }
}
