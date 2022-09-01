<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function bank_index_page()
    {
        return view('dms.bank_account.bank_index');
    }

    public function get_bank_account()
    {
        $all_bank_data = BankAccount::select('*')->get();


        return response()->json(['all_bank_data' => $all_bank_data]);
    }

    public function get_single_bank_account(Request $request)
    {
        $single_bank_data = BankAccount::select('*')
            ->where('id', $request->id)
            ->first();

        return response()->json([
            'single_bank_data' => $single_bank_data
        ]);
    }

    public function store_bank_account(Request $request)
    {
        try {
            BankAccount::create($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Bank Account Added Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function update_bank_account(Request $request)
    {
        BankAccount::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Bank Account Updated Successfully'
        ]);
    }

    public function delete_bank_account(Request $request)
    {
        BankAccount::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Bank Account Deleted Successfully'
        ]);
    }
}
