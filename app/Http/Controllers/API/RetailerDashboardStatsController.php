<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RetailerDashboardStatsController extends Controller
{
    public function __construct()
    {
        
    }
    //

    public function loadDashboardStats()
    {

        $user = Auth::user();
        // $productCount = $user->retailer_products;
        $purchase_orders = $user->retailer_orders;
        $proforma = $purchase_orders->where('status', 'processed')->values();

        // $data['product_count'] = $user->retailer_products->count();
        $data['purchase_orders_count'] = $purchase_orders->count();
        $data['proforma_count'] = $proforma->count();

        return response()->json($data, Response::HTTP_OK);

    }
}
