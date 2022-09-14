<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VATPurchageAccountController extends Controller
{
    public function vat_purchage_homepage()
    {
        return view('dms.vat.vat_purchage_account');
    }
}
