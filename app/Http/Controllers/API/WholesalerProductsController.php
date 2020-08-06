<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class WholesalerProductsController extends ApiController
{
    private $wholesalerProducts;
    public function __construct(WholesalerProduct $wholesalerProducts)
    {
        parent::__construct($wholesalerProducts);
    }


    public function bulkSave(Request $request)
    {
        $data =[];
        return $request;
    }
}
