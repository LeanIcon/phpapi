<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Models\Product;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public $location, $product, $user, $purchaseOrders;
    public function __construct(Location $location, Product $product, User $user, PurchaseOrders $purchaseOrders)
    {
        $this->location = $location;
        $this->product = $product;
        $this->user = $user;
        $this->purchaseOrders = $purchaseOrders;
    }


    public function loadStats()
    {
        $data = array();

        // $purchaseOrders = $this->purchaseOrders::all();
        $invoices = $this->purchaseOrders::where('invoice', '!=', '0')->get();

        $purchaseOrders = $this->purchaseOrders::where('status', 'pending')->get();


        $retailers = $this->user::isRetailer()->get();
        $wholesalers = $this->user::isWholesaler()->get();
        $counts['productcount'] =  $this->product::get()->count();
        $counts['wholesalercount'] =  $wholesalers->count();
        $counts['retailercount'] =  $retailers->count();
        $counts['invoiceCount'] =  $invoices->count();
        $counts['purchaseOrdersCount'] =  $purchaseOrders->count();
        $data[] = $counts;


        return \response()->json($counts);
    }
    //
}
