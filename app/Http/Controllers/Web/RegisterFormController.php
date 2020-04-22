<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterFormController extends Controller
{
    //

    public function loadRegisterForm()
    {
        return view('admin.pages.register.wholesaler');
    }
}
