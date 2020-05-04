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
        $this->middleware('auth');
        $this->middleware(['role:Admin']);
        $this->user = $user;
    }


    /**
     * Check user details
     *
     * @param [type] $userId
     * @return void
     */
    public function approvedUsers($userId = null) 
    {
        $user  =  $this->user::find($userId);

        return view('admin.pages.dashboard.approve-user', compact('user'));
    }

    /**
     * Approved User
     *
     * @param [type] $userId
     * @return void
     */
    public function AcceptapprovedUsers(Request $request, $userId = null) 
    {
       switch ($request->action) {
           case 'approve':
               return $this->actionApprovedUser($userId);
               break;
           case 'cancel':
                return redirect()->route('dashboard.index');
               break;
           default:
               abort('404', "Your request could not be processed at this time");
               break;
       }
    }


    public function actionApprovedUser($userId)
    {
        $user  =  $this->user::find($userId);
        $wholesalerrole = Role::findByName('Wholesaler');
        $user->assignRole([$wholesalerrole->id]);
        return redirect()->route('dashboard.wholesalers');
    }
}
