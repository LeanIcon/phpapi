<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    private $product;
    public  function __construct(Product $product)
    {
        parent::__construct($product);
        $this->product=  $product;
    }

    // public function index(Request $request)
    // {
    //     $limit = $request->limit ?? 15;
    //     $product = new ProductCollection(Product::paginate($limit));
    //     return $product;
    // }

    public function store(Request $request)
    {
        $product = $this->product->create($request->all());
        return  response()->json($product);
    }

    public function search(Request $request)
    {
        $product = $this->product::where('name', $request->keywords)->get();
        return response()->json($product);
         
    }
}
