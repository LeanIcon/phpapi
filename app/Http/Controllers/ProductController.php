<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    public  function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function index(Request $request)
    {
        $limit = $request->limit ?? 15;
        $product = new ProductCollection(Product::paginate($limit));
        return $product;
    }
}
