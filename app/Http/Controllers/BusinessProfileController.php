<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use Illuminate\Http\Request;

class BusinessProfileController extends Controller
{
    public function index()
    {
        return view('dms.business_profile.business_profile');
    }

    public function get_profile()
    {
        $profiles = BusinessProfile::all();

        return response()->json($profiles);
    }

    public function get_single_profile(Request $request)
    {
        $profile = BusinessProfile::find($request->id);

        return response()->json($profile);
    }

    public function add_new_profile(Request $request)
    {
        BusinessProfile::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Mrp added successfully',
        ]);
    }

    public function update_profile(Request $request)
    {
        BusinessProfile::whereId($request->id)->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Mrp updated successfully',
        ]);
    }

    public function delete_profile(Request $request)
    {
        BusinessProfile::whereId($request->id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Mrp deleted successfully',
        ]);
    }
}
