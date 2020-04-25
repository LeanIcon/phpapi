<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterFormController extends Controller
{
    //

    public function loadRegisterForm()
    {
        return view('admin.pages.register.wholesaler');
    }


    public function saveNewUserForm(Request $request)
    {
        $request['password'] = Hash::make($request->password);
        $request['name'] = $request->firstname.' '.$request->lastname;
        $user = new User();
        $user = $user::create($request->all());
        return back();
    }
}
