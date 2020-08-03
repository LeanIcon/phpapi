<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Controllers\ApiController;

class RetailerController extends ApiController
{
    private $user;
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }


    public function index(Request $request)
    {
        $retailers = $this->user::isRetailer()->with('details')->get();
        return new UserResource($retailers);
    }
}
