<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PurchaseOrderItems;

class WholesalerDashboardController extends Controller
{
    public function __construct(PurchaseOrders $purchaseOrders, User $user, PurchaseOrderItems $purchaseOrderItems)
    {
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
        $this->purchaseOrders = $purchaseOrders;
        $this->user = $user;
        $this->purchaseOrderItems = $purchaseOrderItems;
    }
    public function loadDashboard()
    {
        $pageTitle = 'Wholesalers';
        $wholesaler = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->get();

        $approvedPurchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->where('status', 'approved')->get();
        $retailers = $this->user::isRetailer()->get();
        $wholesalername = Auth::user()->name;
        //return $retailers;

       // return $purchaseOrders;
        return view('admin.pages.wholesalers.dashboard', compact('pageTitle','purchaseOrders', 'approvedPurchaseOrders', 'retailers','wholesalername'));
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
