<?php

namespace App\Http\Controllers;

use App\Models\TransactionLadger;
use Illuminate\Http\Request;

class TransactionLadgerController extends Controller
{
    public function get_trans_data(Request $request)
    {
        $trans_data = TransactionLadger::select('*')
            ->where('client_id', 1)
            ->whereBetween('trans_date', ["2021-01-01", "2021-01-04"])
            ->get();

        return response()->json(
            [
                'trans_data' => $trans_data
            ]
        );
    }
}
