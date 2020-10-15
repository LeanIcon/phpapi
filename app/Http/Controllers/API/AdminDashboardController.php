<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Models\Product;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public $location, $product, $user;
    public function __construct(Location $location, Product $product, User $user)
    {
        $this->location = $location;
        $this->product = $product;
        $this->user = $user;
    }


    public function loadStats()
    {
        $data = array();

        $retailers = $this->user::isRetailer()->get();
        $wholesalers = $this->user::isWholesaler()->get();
        $counts['productcount'] =  $this->product::get()->count();
        $counts['wholesalercount'] =  $wholesalers->count();
        $counts['retailercount'] =  $retailers->count();
        $data[] = $counts;


        return \response()->json($counts);
    }
    //
}
