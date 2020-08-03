<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class ProductCategoryController extends ApiController
{
    public function __construct(ProductCategory $productCategory)
    {
        parent::__construct($productCategory);
    }
}
