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
        $pageTitle = 'Purchase Orders';
        $retailer = Auth::user()->id;
        $purchaseOrders = Auth::user()->retailer_orders;

        return view('admin.pages.retailers.purchase_order', compact('pageTitle','purchaseOrders'));
    }

    public function purchaseOrderDetails($purchaseOrderId = null)
    {
        $orderItems = $this->purchaseOrders::find($purchaseOrderId)->order_items;
         return $orderItems;
       // $pageTitle = 'Order Details';
        //return view('admin.pages.retailers.order_details', compact('pageTitle','orderItems'));
    }
}
