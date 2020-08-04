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
        $users = $this->user::isWholesaler()->with('details')->get();
        return new UserResource($users);
    }

    public function show(Request $request, $id)
    {

        $users = $this->user::find($id);
        $data['user'] = $users;
        $data['details'] = $users->details;
        $data['products'] = $users->products;
        return response()->json(['data' => $data]);
        // return new UserResource($users);
    }
}
