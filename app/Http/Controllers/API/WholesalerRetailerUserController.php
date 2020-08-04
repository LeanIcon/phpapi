<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class WholesalerRetailerUserController extends ApiController
{
    private $user;
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }


    public function show(Request $request, $id)
    {
        $user = $this->user::find($id);
        $checkRoleW = $user->hasRole('Wholesaler');
        $checkRoleR = $user->hasRole('Retailer');

        if($checkRoleW){
            $data['user'] = $user;
            $user->details;
            $user->products;
            unset($data['user']['roles']);
            return response()->json(['data' => $data]);
        }
        if($checkRoleR){
            $data[]['user'] = $user;
            $user->details;
            $user->retailer_orders;
            unset($data['user']['roles']);
            return response()->json(['data' => $data]);
        }
        return $user;
    }
}
