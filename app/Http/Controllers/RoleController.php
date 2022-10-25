<?php

namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    public function get_all_roles()
    {
        $roles = Role::all();

        return response()->json(['roles' => $roles]);
    }
}
