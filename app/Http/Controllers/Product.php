<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product extends ApiController
{
    public __construct(Product $product){

    	
    	parent::__construct($product);
    }
}
