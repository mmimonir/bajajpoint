<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        return view('dms.quotations.create_qt');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
