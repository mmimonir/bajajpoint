<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Service\Employee;
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
        $emp_data = Employee::select('*')->where('id', $request->emp_id)->first();


        if ($attendance_data->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Attendance data found',
                'attendance_data' => $attendance_data,
                'emp_data' => $emp_data
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Attendance data not found',
                'attendance_data' => null,
                'emp_data' => null
            ]);
        }
        // return response()->json(['attendance_data' => $attendance_data]);
    }

    public function daily_attendance_store(Request $request)
    {
        try {
            EmployeeAttendance::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    $request->attendance_day_column => $request->attendance_text,
                    'emp_id' => $request->emp_id_attendance,
                    'month' => $request->attendance_datetime,
                    'advance' => $request->advance ?? 0,
                    'absent_deduction' => $request->absent_deduction ?? 0,
                    'total_payable' => $request->total_payable ?? 0,
                ]
            );

            return response()->json([
                'status' => 200,
                'message' => 'Attendance updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function salary_calculate(Request $request)
    {
        EmployeeAttendance::find($request->id)->update([
            'advance' => $request->advance,
            'absent_deduction' => $request->absent_deduction,
            'total_payable' => $request->total_payable,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Salary calculated successfully',
        ]);
    }
}
