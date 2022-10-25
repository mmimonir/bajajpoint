<?php

namespace App\Http\Controllers;

class EmployeeAttendanceController extends Controller
{
    public function attendance_init()
    {
        return view('dms.attendance.attendance');
    }
}
