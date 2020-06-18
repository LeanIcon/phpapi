<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\SmsNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterFormController extends Controller
{
    use SmsNotification;
    //
    public function loadRegisterForm()
    {
        return view('admin.pages.register.wholesaler');
    }


    public function saveNewUserForm(Request $request)
    {
        $user = new User();
        $pin = User::generatePin();
        $senderId = 'NNURO';
        $phone = '233'.Str::after($request->phone, '0');
        $request['phone'] = $phone;
        $request['password'] = Hash::make(12345678);
        $request['name'] = $request->firstname.' '.$request->lastname;
        $request['slug'] = Str::slug($request->firstname.' '.$request->lastname);
        $user = $request['name'];
        $request['otp']  = $pin;

        $msg = "Welcome: $user to Nnuro%0aYour Verification Code: $pin%0aConfirm code on login to proceed%0aThank you!!!";
        $notify = $this->SendSMSNotify($request['phone'], $msg);

        $user = $user::create($request->all());
        return redirect()->route('dashboard.index');
    }
}
