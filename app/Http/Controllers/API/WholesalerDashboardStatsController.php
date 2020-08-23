<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WholesalerDashboardStatsController extends Controller
{
    public function __construct()
    {
        
    }

    public function loadDashboardStats()
    {

        $user = Auth::user();
        $productCount = $user->wholesaler_products;
        $purchase_orders = $user->wholesaler_orders;
        $proforma = $purchase_orders->where('status', 'processed')->values();

        $data['purchase_orders_count'] = $purchase_orders->count();
        $data['product_count'] = $user->wholesaler_products->count();
        $data['proforma_count'] = $proforma->count();

        return response()->json($data, Response::HTTP_OK);

    }
}
