<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class ApproveRegistrationController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }



    public function approvedUsers($userId = null) 
    {
        $user  =  $this->user::find($userId);
        return view('admin.pages.dashboard.approve-user', compact('user'));
    }

    public function AcceptapprovedUsers($userId = null) 
    {
        $user  =  $this->user::find($userId);
        $wholesalerrole = Role::findByName('Wholesaler');
        $user->assignRole([$wholesalerrole->id]);
        return redirect()->route('dashboard.wholesalers');
    }
}
