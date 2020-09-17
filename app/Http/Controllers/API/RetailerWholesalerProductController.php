<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WholesalerProduct;

class RetailerWholesalerProductController extends ApiController
{
    public function __construct(User $user, WholesalerProduct $wholesalerProduct)
    {
        parent::__construct($wholesalerProduct);
        $this->wholesalerProduct = $wholesalerProduct;
        $this->user = $user;
    }
    public function loadWholesalerProducts(Request $request)
    {
        $wholesaler = $this->user::find($request->wholesaler_id);
        return $this->Resource::collection($wholesaler->product);
        return response()->json($wholesaler);
    }

    public function loadRetailWholesalerProducts()
    {
        // $wholesalers = $this->user::isWholesaler()->with('product')->get()->pluck('product')->flatten();
        // $wholesalers = $this->user::isWholesaler()->with('products')->get();
        $wholesalers = $this->wholesalerProduct->with('product')->get();

        return response()->json($wholesalers);
    }
}
