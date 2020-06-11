<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyPinPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function loadpage(Request $request)
    {
        return view('admin.verify_otp');
    }
}