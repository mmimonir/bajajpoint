<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SparePartsStockController extends Controller
{
    public function index()
    {
        return view('dms.service.purchage.spare_parts_purchage');
    }
}
