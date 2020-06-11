<?php

namespace App\Http\Controllers\Web;

use App\User;
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
        $auth = Auth::user();

        return $auth;
        $up = $this->user::where('phone', $auth->phone)->where('otp', $request->otp)->first();
        $up->update(['pin_confirmed' => 1]);
        return redirect()->route('dashboard.index');
    }
}
