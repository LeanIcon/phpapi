<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class WholesalerProductsController extends ApiController
{
    private $wholesalerProducts;
    public function __construct(WholesalerProduct $wholesalerProducts)
    {
        $this->middleware('auth:api');
        parent::__construct($wholesalerProducts);
    }


    public function bulkSave(Request $request)
    {
        $data =[];
        return $request;
    }

    public function saveSingleProduct(Request $request)
    {
        $user = Auth::user();
        $wholesalerProduct = $user->wholesaler_products()->create($request->all());
        return response()->json($wholesalerProduct, Response::HTTP_CREATED);
    }
}
