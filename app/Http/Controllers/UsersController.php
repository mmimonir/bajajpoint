<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Service\Employee;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function load_user_profile()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        return view('user_profile.user_profile', compact('employee'));
    }
}
