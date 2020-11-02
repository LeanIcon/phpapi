<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    private $user;
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }


    public function updateUserStatus(Request $request)
    {
        $status = '';
        if ($request->status) {
            $status = 'true';
        }
        else{
            $status = 'false';
        }
        $changeStatus = $this->user::find($request->id);
        $changeStatus->status = $status;
        $changeStatus->save();
        // $changeStatus = $this->user::find($request->id)->delete();
        return \response()->json(['status' => 'User Status Updated']);
    }
}
