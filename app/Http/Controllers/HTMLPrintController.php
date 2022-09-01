<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HTMLPrintController extends Controller
{
    public function full_hform()
    {
        return view('dms.html_print.brta.hform_full')->with([
            'print_data' => null,
        ]);
    }
}
