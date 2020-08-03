<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\ProductCategoryTypes;
use Illuminate\Http\Request;

class CategoryTypesController extends ApiController
{
    public function __construct(ProductCategoryTypes $productCategoryTypes)
    {
        parent::__construct($productCategoryTypes);
    }
}
