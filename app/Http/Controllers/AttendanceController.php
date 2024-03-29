<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendance;
use App\Models\EmployeeTimestamp;
use App\Models\Service\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function get_attendance_by_empid(Request $request)
    {
        $month = Carbon::parse($request->attendance_timestamp)->month ?? Carbon::now()->month;
        $year = Carbon::parse($request->attendance_timestamp)->year ?? Carbon::now()->year;
        // $day = Carbon::parse($request->attendance_timestamp)->day ?? Carbon::now()->day;
        // dd($request->attendance_timestamp);

        $attendance_data = EmployeeAttendance::select('*')
            ->where('emp_id', $request->emp_id)
            ->whereMonth('month', $month)
            ->whereYear('month', $year)
            // ->whereDay('month', $day)
            ->get();
        $emp_data = Employee::select('*')->where('id', $request->emp_id)->first();

        if ($attendance_data->count() > 0) {
            $timestamptable_id = $attendance_data[0]->id;

            $attendance_timestamp_data = EmployeeTimestamp::select('*')
                ->where('emp_attendance_id', $timestamptable_id)
                ->whereYear('attendance_datetime', $year)
                ->whereMonth('attendance_datetime', $month)
                ->orderBy('attendance_datetime', 'asc')
                // ->limit(10)
                ->get();
        }

        if ($attendance_data->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Attendance data found',
                'attendance_data' => $attendance_data,
                'emp_data' => $emp_data,
                'attendance_timestamp_data' => $attendance_timestamp_data ?? null,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Attendance data not found',
                'attendance_data' => null,
                'emp_data' => null,
                'attendance_timestamp_data' => null,
            ]);
        }
    }

    public function daily_attendance_store(Request $request)
    {
        try {
            $last_id = EmployeeAttendance::updateOrCreate(
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
                    'created_by' => $request->user()->id,
                    'updated_by' => $request->user()->id,
                    'deleted_by' => $request->user()->id,
                ]
            )->id;

            $last_timestamp_id = EmployeeTimestamp::updateOrCreate(
                [
                    'id' => $request->attendance_timestamp_id,
                ],
                [
                    'emp_attendance_id' => $last_id,
                    'attendance_datetime' => $request->attendance_datetime,
                ]
            )->id;

            return response()->json([
                'status' => 200,
                'message' => 'Attendance updated successfully',
                'last_id' => $last_id,
                'last_timestamp_id' => $last_timestamp_id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
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

    public function timestamp_create_or_update(Request $request)
    {
        $timestamp_id = EmployeeTimestamp::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'emp_attendance_id' => $request->emp_attendance_id,
                'attendance_datetime' => $request->attendance_datetime,
            ]
        )->id;

        return response()->json([
            'status' => 200,
            'message' => 'Timestamp updated successfully',
            'timestamp_id' => $timestamp_id,
        ]);
    }

    public function attendance_timestamp_get(Request $request)
    {
        $month = Carbon::parse($request->attendance_datetime)->month;
        $day = Carbon::parse($request->attendance_datetime)->day;
        $timestamp_id = EmployeeTimestamp::select('id')
            ->where('emp_attendance_id', $request->emp_attendance_id)
            ->whereMonth('attendance_datetime', $month)
            ->whereDay('attendance_datetime', $day)
            ->first();

        return response()->json([
            'status' => 200,
            'message' => 'Timestamp data found',
            'timestamp_id' => $timestamp_id ?? null,
        ]);
    }
}
