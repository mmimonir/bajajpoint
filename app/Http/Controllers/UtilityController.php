<?php

namespace App\Http\Controllers;

use App\Models\Mrp;
use Illuminate\Http\Request;
use App\Models\AssessmentYear;

class UtilityController extends Controller
{
    public function assessment_year(Request $request)
    {
        $vat_mrp = Mrp::select('vat_mrp')->where('model_code', $request->model_code)->get();
        $assessment = AssessmentYear::select('*')->first();

        return response()->json(['assessment' => $assessment, 'vat_mrp' => $vat_mrp]);
    }
}
