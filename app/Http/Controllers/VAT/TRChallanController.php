<?php

namespace App\Http\Controllers\VAT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TRChallanController extends Controller
{
    public function tr_challan()
    {
        return view('dms.vat.tr_challan');
    }
}
