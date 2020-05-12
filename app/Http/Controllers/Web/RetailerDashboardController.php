<?php

namespace App\Http\Controllers\Web;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetailerDashboardController extends Controller
{
    public function __construct(PurchaseOrders $purchaseOrders, User $user)
    {
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
        $this->purchaseOrders = $purchaseOrders;
        $this->user = $user;
    }
    public function loadDashboard()
    {
        $pageTitle = 'Retailers';
        $retailer = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('retailer_id', $retailer)->get();
        $approvedPurchaseOrders = $this->purchaseOrders::where('retailer_id', $retailer)->where('status', 'approved')->get();
        $wholesalers = $this->user::isWholeSaler()->get();
        // return $approvedPurchaseOrders->count();
        // return $purchaseOrders;
        return view('admin.pages.retailers.dashboard', compact('pageTitle', 'purchaseOrders','approvedPurchaseOrders', 'wholesalers'));
    }

    public function loadPurchaseOrderList()
    {
        $pageTitle = "Purchase List";
        return view('admin.pages.retailers.purchase_order-list', compact('pageTitle'));
    }

    public function displayPurchaseOrders(){
        $pageTitle = 'Orders';
        $retailer = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::groupBy('wholesaler_id')->get();
        $wholesalers = $this->user::isWholeSaler()->get();
        //return $purchaseOrders;
        //return $wholesalers;
        return view('admin.pages.retailers.purchase_order', compact('pageTitle', 'purchaseOrders'));
    }

    public function purchaseOrderDetails(){
        $pageTitle = 'orderdetails';
        $retailer = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('retailer_id', $retailer)->get();
        $wholesalers = $this->user::isWholeSaler()->get();
        // return $approvedPurchaseOrders->count();
        // return $purchaseOrders;
        return view('admin.pages.retailers.order_details', compact('pageTitle','purchaseOrders'));

    }
}
