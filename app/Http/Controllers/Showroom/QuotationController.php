<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\{Quotation, QuotationItem};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
                $quotation->notes = $request['notes'];
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
            $last_data = Quotation::latest()->first();
            return response()->json([
                'status' => 200,
                'last_data' => $last_data
            ]);
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
            'notes',
            'for',
        )->where('id', $id)->first();

        $item_id = $quotations->id;

        $quotation_items = QuotationItem::select('*')->where('quotation_id', $item_id)->get();

        return view('dms.quotations.quotation_html')
            ->with([
                'quotations' => $quotations,
                'quotation_items' => $quotation_items
            ]);
    }

    public function quotation_edit($id)
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
            'for',
            'notes'
        )->where('id', $id)->first();

        $item_id = $quotations->id;

        $quotation_items = QuotationItem::select('*')->where('quotation_id', $item_id)->get();

        return response()->json(['quotations' => $quotations, 'quotation_items' => $quotation_items]);
    }
    public function quotation_update(Request $request)
    {
        // dd($request->all());
        try {
            DB::transaction(function () use ($request) {
                Quotation::where('id', $request->qt_id)->update([
                    'ref' => $request['ref'],
                    'qt_date' => $request['qt_date'],
                    'to' => $request['to'],
                    'address_one' => $request['address_one'],
                    'address_two' => $request['address_two'],
                    'account' => $request['account'],
                    'subject' => $request['subject'],
                    'validity' => $request['validity'],
                    'for' => $request['for'],
                    'discount' => $request['discount'],
                    'notes' => $request['notes'],
                ]);

                foreach ($request->tb_description as $key => $value) {
                    QuotationItem::where('id', $request->item_id[$key])->update([
                        'tb_description' => $request->tb_description[$key],
                        'tb_unit' => $request->tb_unit[$key],
                        'tb_unit_price' => $request->tb_unit_price[$key],
                        'tb_grand_total' => $request->tb_grand_total[$key],
                    ]);
                }
            });
            return response()->json(['status' => 200, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
    public function quotation_delete(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Quotation::where('id', $request->id)->delete();
                QuotationItem::where('quotation_id', $request->id)->delete();
            });
            return response()->json(['status' => 200, 'message' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 502]);
        }
    }
}
