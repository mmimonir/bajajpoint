<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\Mrp;
use App\Models\Showroom\PriceDeclare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use App\Models\Showroom\Vehicle;

class PriceDeclareController extends Controller
{
    public function index()
    {
        return view('dms.showroom.price_declare.price_declare');
    }
    public function get_business_profile()
    {
        $profile_data = BusinessProfile::select('id', 'name')->get();
        $vehicles = Vehicle::select('id', 'model', 'model_code')->where('status', 'Active')->get();

        return response()->json([
            'profile_data' => $profile_data,
            'vehicles' => $vehicles
        ]);
    }

    public function pd_get()
    {
        $pd_data = PriceDeclare::leftJoin(
            'business_profiles',
            'business_profiles.id',
            '=',
            'price_declares.business_profile_id'
        )->leftJoin(
            'vehicles',
            'vehicles.model_code',
            '=',
            'price_declares.model_code'
        )
            ->select(
                'price_declares.id as pd_id',
                'price_declares.buy_price',
                'price_declares.vat_mrp',
                'price_declares.submit_date',
                'price_declares.mushak_date',
                'price_declares.status',
                'business_profiles.name',
                'vehicles.model'
            )
            ->get();

        return response()->json(['pd_data' => $pd_data]);
    }

    public function get_single_pd(Request $request)
    {
        $pd_data = PriceDeclare::leftJoin(
            'business_profiles',
            'business_profiles.id',
            '=',
            'price_declares.business_profile_id'
        )->rightJoin(
            'vehicles',
            'vehicles.model_code',
            '=',
            'price_declares.model_code'
        )->select(
            'price_declares.*',
            'price_declares.id as pd_id',
            'business_profiles.*',
            'business_profiles.id as profile_id',
            'vehicles.model'
        )
            ->where('price_declares.id', $request->id)
            ->first();
        $vehicle_data = Vehicle::select('id as vehicle_id', 'model', 'model_code')->get();
        $profile_data = BusinessProfile::select('id as profile_id', 'name')->get();
        // return response()->json($request->id);
        return response()->json([
            'pd_data' => $pd_data,
            'vehicle_data' => $vehicle_data,
            'profile_data' => $profile_data
        ]);
    }

    public function pd_add(Request $request)
    {
        try {
            PriceDeclare::create($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Price Declare Added Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function pd_update(Request $request)
    {
        PriceDeclare::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Price Declare Updated Successfully'
        ]);
    }

    public function pd_delete(Request $request)
    {
        PriceDeclare::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Price Declare Deleted Successfully'
        ]);
    }
}
