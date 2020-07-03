<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Models\Location;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\SmsNotification;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use SmsNotification;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $regNo=$data['PC']."/".$data['RegionCode']."/".$data['AccountType']."/".$data['RegNo'];
        $phonenumber = '233'.Str::after($data['phone'], '0');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'phone'.$phonenumber => ['required', 'string', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'reg_no'.$regNo => ['unique:user_details'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$location = strtolower(Location::find($data['location'])->name);
        $location=$data['location'];
        $slug  = Str::slug($data['name']);
        $uname = $slug.'-'.$location;
        $pin = User::generatePin();
        $phone = '233'.Str::after($data['phone'], '0');


        $user = User::create([
            'type' => $data['type'],
            'name' =>  $data['name'],
            'phone' => $phone,
            'username' =>  $uname,
            'otp' => $pin,
            'slug' =>  $slug,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        // %26
        if(User::activeUserAccess($user))
        {
            $regNo=$data['PC']."/".$data['RegionCode']."/".$data['AccountType']."/".$data['RegNo'];
            $msg = "Welcome: $user->name to Nnuro%0aYour Verification Code is $pin%0aKindly confirm code on proceed%0aThank you!!!";
            $notify = $this->SendSMSNotify($user->phone, $msg); 
            UserDetails::create([
                'users_id' => $user->id, 
                'town_id' => $data['region'],
                'location'=>$data['location'],
                'reg_no'=>$regNo
                // 'reg_no'=>$data['PC'] 

                ]);
                return $user;
            };

        return $user;
    }
}
