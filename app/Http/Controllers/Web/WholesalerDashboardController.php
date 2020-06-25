<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PurchaseOrderItems;
use Illuminate\Support\Facades\Session;

class WholesalerDashboardController extends Controller
{
    public function __construct(PurchaseOrders $purchaseOrders, User $user, PurchaseOrderItems $purchaseOrderItems)
    {
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
        $this->middleware('check-pin');
        $this->purchaseOrders = $purchaseOrders;
        $this->user = $user;
        $this->purchaseOrderItems = $purchaseOrderItems;
    }
    public function loadDashboard()
    {
        $pageTitle = 'Wholesaler';
        $wholesaler = Auth::user();
        $purchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler->id)->get();
        $pendingPurchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler->id)->where('status', 'undefined') ->orWhere('status','pending')->get();
        $approvedPurchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler->id)->where('status', 'approved')->get();
        $retailers = $this->user::isRetailer()->get();
        $products = $wholesaler->wholesaler_products;
        $proforminvoices = collect($wholesaler->wholesaler_orders)->where('order_type', 'pro_forma');
        return view('admin.pages.wholesalers.dashboard', compact('pageTitle','purchaseOrders', 'approvedPurchaseOrders', 'retailers','pendingPurchaseOrders','products','proforminvoices'));
    }


    public function loadProducts()
    {
        return view('admin.pages.wholesalers.products');
    }


    public function loadpurchasereceived()
    {
        $pageTitle = 'Purchase Order List';
        $wholesaler = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->get();

       // $approvedPurchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->where('status', 'approved')->get();
        $retailers = $this->user::isRetailer()->get();

        //return $retailers;

       // return $purchaseOrders;
        return view('admin.pages.wholesalers.purchaseorderlist', compact('pageTitle','purchaseOrders','retailers'));
    }
   


}
