<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetailerDashboardController extends Controller
{
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->user = $user;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
        $this->purchaseOrders = $purchaseOrders;
    }
    public function loadDashboard()
    {
        $pageTitle = 'Retailers';
        $retailer = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('retailer_id', $retailer)->get();
        $approvedPurchaseOrders = $this->purchaseOrders::where('retailer_id', $retailer)->where('status', 'approved')->get();

        // return $approvedPurchaseOrders->count();
        // return $purchaseOrders;
        return view('admin.pages.retailers.dashboard', compact('pageTitle', 'purchaseOrders','approvedPurchaseOrders'));
    }

    public function loadPurchaseOrderList()
    {
        $pageTitle = "Purchase List";
        return view('admin.pages.retailers.purchase_order-list', compact('pageTitle'));
    }
}
