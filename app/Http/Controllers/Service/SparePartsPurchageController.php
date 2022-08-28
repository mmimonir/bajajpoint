<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use App\Models\Service\SparePartsStock;
use App\Models\Service\SparePartsPurchage;
use App\Models\Service\PartsPurchageInvoice;
use App\Models\Service\SparePartsSupplier;

class SparePartsPurchageController extends Controller
{
    public function index()
    {
        return view('dms.service.purchage.spare_parts_purchage');
    }

    public function vendor_list()
    {
        $vendor_list = SparePartsSupplier::select('*')->get();

        return response()->json([
            'vendor_list' => $vendor_list
        ]);
    }

    public function load_invoice_list(Request $request)
    {
        $year = date('Y', strtotime($request->purchage_date ?? Carbon::now()->toDateString()));
        $month = date('m', strtotime($request->purchage_date ?? Carbon::now()->toDateString()));

        $invoice_list = PartsPurchageInvoice::select('*')
            ->whereYear(
                'purchage_date',
                '=',
                $year
            )
            ->whereMonth(
                'purchage_date',
                '=',
                $month
            )
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'invoice_list' => $invoice_list,
        ]);
    }

    public function purchage_create_or_update(Request $request)
    {
        $id = SparePartsPurchage::updateOrCreate([
            'id' => $request->id,
        ], [
            'part_id' => $request->part_id,
            'purchage_bill_no' => $request->purchage_bill_no,
            'purchage_date' => $request->purchage_date,
            'quantity' => $request->stock_quantity,
            'rate' => $request->rate,
        ]);

        return response()->json($id);
    }
    public function delete_parts(Request $request)
    {
        SparePartsPurchage::where('id', $request->id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }

    public function store_invoice(Request $request)
    {
        if ($request->update == 'true') {
            PartsPurchageInvoice::where('id', $request->purchage_id)->update([
                'purchage_bill_no' => $request->purchage_bill_no,
                'purchage_date' => $request->purchage_date,
                'supplier_id' => $request->supplier_id,
                'net_purchage_amount' => $request->net_purchage_amount,
                'discount' => $request->discount,
                'dealer_id' => $request->dealer_name,
                'grand_total' => $request->grand_total,
            ]);
            SparePartsPurchage::where('parts_purchage_invoices_id', $request->purchage_id)->update([
                'purchage_bill_no' => $request->purchage_bill_no,
                'purchage_date' => $request->purchage_date,
            ]);
        } else {
            DB::transaction(function () use ($request) {
                $data = new PartsPurchageInvoice();
                $data->supplier_id = $request->supplier_id;
                $data->purchage_bill_no = $request->purchage_bill_no;
                $data->purchage_date = $request->purchage_date;
                $data->discount = $request->discount;
                $data->net_purchage_amount = $request->net_purchage_amount;
                $data->dealer_id = $request->dealer_name;
                $data->grand_total = $request->grand_total;
                $data->save();

                $invoice_id = $data->id;

                if ($invoice_id) {
                    SparePartsPurchage::where(
                        [
                            'purchage_bill_no' => $request->purchage_bill_no,
                            'purchage_date' => $request->purchage_date
                        ]
                    )->update(['parts_purchage_invoices_id' => $invoice_id]);
                }

                foreach ($request->part_id as $key => $value) {
                    if ($request->part_id[$key] != null) {
                        $current_stock = SparePartsStock::where(
                            'part_id',
                            $request->part_id[$key]
                        )->first();
                        if ($current_stock) {
                            $current_stock->stock_quantity += $request->quantity[$key];
                            $current_stock->rate = $request->rate[$key];
                            $current_stock->location = $request->location[$key];
                            $current_stock->save();
                        }
                    }
                }
            });
        }

        return response()->json([
            'status' => 200,
            'message' => 'Invoice Created Successfully',
        ]);
    }

    public function load_single_invoice(Request $request)
    {
        $purchage_details = PartsPurchageInvoice::select('*')
            ->where([
                'id' => $request->id,
            ])
            ->first();

        // fetch spare parts sale details based on job card no
        $spare_parts_purchage_details = SparePartsPurchage::rightJoin(
            'spare_parts_stocks',
            'spare_parts_stocks.part_id',
            '=',
            'spare_parts_purchages.part_id'
        )
            ->select(
                'spare_parts_purchages.*',
                'spare_parts_stocks.location',
                'spare_parts_stocks.part_name'
            )
            ->where([
                'spare_parts_purchages.parts_purchage_invoices_id' => $request->id,
            ])
            ->get();

        return response()->json([
            'purchage_details' => $purchage_details,
            'spare_parts_purchage_details' => $spare_parts_purchage_details,

        ]);
    }
    public function edit_invoice_purchage()
    {
        $supplier_list = SparePartsSupplier::select('id', 'name')->get();
        $dealer_list = BusinessProfile::select('id', 'business_code', 'name')->get();

        return response()->json([
            'supplier_list' => $supplier_list,
            'dealer_list' => $dealer_list,
        ]);
    }
    public function dealer_list()
    {
        $dealer_list = BusinessProfile::select('id', 'business_code', 'name')->get();
        return response()->json([
            'dealer_list' => $dealer_list,
        ]);
    }
}
