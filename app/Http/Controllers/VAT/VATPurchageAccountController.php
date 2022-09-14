<?php

namespace App\Http\Controllers\VAT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VATPurchageAccountController extends Controller
{
    public function vat_purchage_homepage(Request $request)
    {
        return view('dms.vat.vat_purchage_account');
    }
}
