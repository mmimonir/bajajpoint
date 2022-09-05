<?php

namespace App\Http\Controllers\Service;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Service\Employee;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function employee_index()
    {
        return view('dms.service.employee.employee');
    }

    public function employee_get()
    {
        $employee = Employee::leftJoin('roles', 'roles.id', '=', 'employees.roles_id')
            ->select(
                'employees.*',
                'roles.roles_name',
                'roles.id as roles_id'
            )
            ->get();
        return response()->json(['employee' => $employee]);
    }

    public function get_single_employee(Request $request)
    {
        $employee = Employee::find($request->id);
        $roles = Role::all();

        return response()->json([
            'employee' => $employee,
            'roles' => $roles
        ]);
    }

    public function employee_add(Request $request)
    {
        Employee::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'Employee added successfully'
        ]);
    }

    public function employee_update(Request $request)
    {
        Employee::whereId($request->id)->update($request->all());
        return response()->json([
            'status' => 200,
            'success' => 'Employee updated successfully'
        ]);
    }

    public function employee_delete(Request $request)
    {
        Employee::whereId($request->id)->delete();
        return response()->json([
            'status' => 200,
            'success' => 'Employee deleted successfully'
        ]);
    }
}
