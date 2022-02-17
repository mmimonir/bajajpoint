<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function index()
    {
        return view('dms.quotations.create_qt');
    }

    public function store(Request $request)
    {

        try {
            DB::transaction(function () use ($request) {
                $quotation = new Quotation();
                $quotation->ref = $request['ref'];
                $quotation->qt_date = $request['qt_date'];
                $quotation->to = $request['to'];
                $quotation->address_one = $request['address_one'];
                $quotation->address_two = $request['address_two'];
                $quotation->account = $request['account'];
                $quotation->subject = $request['subject'];
                $quotation->validity = $request['validity'];
                $quotation->for = $request['for'];
                $quotation->save();

                $qt_id = $quotation->id;


                foreach ($request->tb_description as $key => $value) {
                    $save_record = [
                        'quotation_id' => $qt_id,
                        'tb_description' => $request->tb_description[$key],
                        'tb_unit' => $request->tb_unit[$key],
                        'tb_unit_price' => $request->tb_unit_price[$key],
                        'tb_grand_total' => $request->tb_grand_total[$key],
                    ];
                    QuotationItem::insert($save_record);
                }
            });
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
}
