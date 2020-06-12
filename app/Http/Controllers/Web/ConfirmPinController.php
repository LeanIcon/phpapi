<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfirmPinController extends Controller
{
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }



    public function __invoke(Request $request)
    {
        $phone = '233'.Str::after($request->phone, '0');
        $auth = Auth::user();
        $up = $this->user::where('phone',  $phone)->where('otp', $request->otp);
        $userUp = $up->update(['pin_confirmed' => 1]);
        return redirect()->route('dashboard.index');
    }
}
