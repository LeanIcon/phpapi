<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WholesalerProduct;

class RetailershortagelistController extends Controller
{
    public $product, $wholesalerProduct;
    public function __construct(Product $product, WholesalerProduct $wholesalerProduct)
    {
        $this->product = $product;
        $this->wholesalerProduct = $wholesalerProduct;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Retailer_Shortagelist';
        $products = $this->wholesalerProduct::all();
        return view('admin.pages.retailers.retailer_shortagelist', compact('pageTitle', 'products'));

    }

    public function viewShortageList()
    {
        $pageTitle  = ' Shortage List';
        return view('admin.pages.retailers.shortage.shortage_list', compact('pageTitle'));
    }
}
