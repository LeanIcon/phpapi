<?php

namespace App\Http\Controllers\Web;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDetailsController extends Controller
{

    public function __construct(UserDetails $userDetails)
    {
        $this->userDetails = $userDetails;
    }
    public function updateUserDetails(Request $request, $user = null)
    {
        $request['users_id'] = $user;
        $data = $request->except('_token');
        $userDetails = $this->userDetails::updateOrCreate($data);
        return $userDetails;
    }
}
