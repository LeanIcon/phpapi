<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WholesalerDashboardController extends Controller
{
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
        $this->purchaseOrders = $purchaseOrders;
    }
    public function loadDashboard()
    {
        $pageTitle = 'Wholesalers';
        $wholesaler = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->get();
        $approvedPurchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->where('status', 'approved')->get();
        return view('admin.pages.wholesalers.dashboard', compact('pageTitle','purchaseOrders', 'approvedPurchaseOrders'));
    }


    public function loadProducts()
    {
        return view('admin.pages.wholesalers.products');
    }
}
