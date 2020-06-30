<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Models\Region;
use App\Models\Location;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\SmsNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterFormController extends Controller
{
    private $regions;
    public $location;
    public function __construct(Location $location,Region $regions)
    {
        $this->regions = $regions;
        $this->location = $location;
    }
    use SmsNotification;
    //
    public function loadRegisterForm()
    {
        $locations = $this->location::all();
        $regions = $this->regions::all();
        return view('admin.pages.register.signup', compact('regions','locations'));
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

        $user = $user::create($request->all());

        if(User::activeUserAccess($user))
        {
            $regNo=$request['PC']."/".$request['RegionCode']."/".$request['AccountType']."/".$request['RegNo'];
            $msg = "Welcome: $user->name to Nnuro%0aYour Verification Code: $pin%0aConfirm code on proceed%0aThank you!!!";
            $notify = $this->SendSMSNotify($user->phone, $msg); 
            UserDetails::create([
                'users_id' => $user->id, 
                'town_id' => $request['region'],
                'location'=>$request['location'],
                'reg_no'=>$regNo
                // 'reg_no'=>$data['PC'] 

                ]);
                return redirect()->route('dashboard.index');
            };
        return redirect()->route('dashboard.index');
    }
}
