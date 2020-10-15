<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{

    public function getSysteRoles()
    {
        $roles = Role::all();
        return \response()->json($roles);
    }
}
