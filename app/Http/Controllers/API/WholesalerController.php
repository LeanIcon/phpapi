<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class WholesalerController extends ApiController
{
    private $user;
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $retailers = $this->user::isWholesaler()->with('details')->get();
        return new UserResource($retailers);
    }
}
