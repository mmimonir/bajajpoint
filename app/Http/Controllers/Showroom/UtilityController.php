<?php

namespace App\Http\Controllers\Showroom;

use App\Models\Showroom\Mrp;
use Illuminate\Http\Request;
use App\Models\Showroom\AssessmentYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class UtilityController extends Controller
{
    public function assessment_year(Request $request)
    {
        $vat_mrp = Mrp::select('vat_mrp')->where('model_code', $request->model_code)->get();
        $assessment = AssessmentYear::select('*')->first();

        return response()->json(['assessment' => $assessment, 'vat_mrp' => $vat_mrp]);
    }
    public function download()
    {
        Artisan::call('backup:run --only-db');
        $path = storage_path('app/Bajaj-Point/*');
        $latest_ctime = 0;
        $latest_filename = '';
        $files = glob($path);
        foreach ($files as $file) {
            if (is_file($file) && filectime($file) > $latest_ctime) {
                $latest_ctime = filectime($file);
                $latest_filename = $file;
            }
        }
        return response()->download($latest_filename);
    }
    public function ladger()
    {
        return view('dms.ladger.ladger');
    }
}
