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

    public function quotation_list()
    {
        $quotations = Quotation::select(
            'id',
            'ref',
            'qt_date',
            'to',
            'address_one',
            'address_two',
            'account',
            'discount',
            'validity',
        )->get();
        return view('dms.quotations.quotation_list')->with('quotations', $quotations);
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
                $quotation->discount = $request['discount'];
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
    public function quotation_print_html($id)
    {

        $quotations = Quotation::select(
            'id',
            'ref',
            'qt_date',
            'to',
            'address_one',
            'address_two',
            'account',
            'discount',
            'validity',
        )->where('id', $id)->first();

        $item_id = $quotations->id;

        $quotation_items = QuotationItem::select('*')->where('quotation_id', $item_id)->get();

        return view('dms.quotations.quotation_html')
            ->with([
                'quotations' => $quotations,
                'quotation_items' => $quotation_items
            ]);
    }
}
