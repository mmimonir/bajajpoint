<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;

class AttendanceController extends Controller
{
    public function get_attendance_by_empid(Request $request)
    {
        $month = Carbon::now()->month;
        $attendance_data = EmployeeAttendance::select('*')
            ->where('emp_id', $request->emp_id)
            ->whereMonth('month', $month)
            ->get();


        if ($attendance_data->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Attendance data found',
                'attendance_data' => $attendance_data
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Attendance data not found',
                'attendance_data' => null
            ]);
        }
        // return response()->json(['attendance_data' => $attendance_data]);
    }
}
