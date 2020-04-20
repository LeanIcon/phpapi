<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    public __construct(Product $product){

    	
    	parent::__construct($product);
    }
}
