<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    public function getSystemPerms()
    {
        $permissions = Permission::all();
        return \response()->json($permissions);
    }
}
