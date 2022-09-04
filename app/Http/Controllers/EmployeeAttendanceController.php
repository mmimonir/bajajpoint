<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function attendance_init()
    {
        return view('dms.attendance.attendance');
    }
}
