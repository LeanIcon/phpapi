<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\WholesalerResource;
use App\Http\Resources\WholesalerProductResource;
use App\Http\Resources\WholesalerProductCollection;

class WholesalerProductsController extends ApiController
{
    private $wholesalerProduct;
    public function __construct(WholesalerProduct $wholesalerProduct)
    {
        $this->middleware('auth:api');
        parent::__construct($wholesalerProduct);
    }

    // public function index(Request $request)
    // {
    //     $user = Auth::user();
    //     return $this->Resource::collection($user->product);

    //     // $products = $user->product;
    //     // return response()->json($products);
    // }


    public function bulkSave(Request $request)
    {
        $user = Auth::user();
        $saveProds = $user->product()->attach($request->all());
        return response()->json($saveProds);
    }

    public function saveSingleProduct(Request $request)
    {
        $user = Auth::user();
        $wholesalerProduct = $user->wholesaler_products()->create($request->all());
        return response()->json($wholesalerProduct, Response::HTTP_CREATED);
    }
}
