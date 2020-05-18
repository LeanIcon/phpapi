<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class WholesalerDashboardController extends Controller
{
    public function __construct(PurchaseOrders $purchaseOrders, User $user)
    {
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
        $this->purchaseOrders = $purchaseOrders;
        $this->user = $user;
    }
    public function loadDashboard()
    {
        $pageTitle = 'Wholesalers';
        $wholesaler = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->get();

        $approvedPurchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->where('status', 'approved')->get();
        $retailers = $this->user::isRetailer()->get();

        //return $retailers;

       // return $purchaseOrders;
        return view('admin.pages.wholesalers.dashboard', compact('pageTitle','purchaseOrders', 'approvedPurchaseOrders', 'retailers'));
    }


    public function loadProducts()
    {
        return view('admin.pages.wholesalers.products');
    }

    public function retailerpurchasedetails($purchaseOrderId = null)
    {
       // $pageTitle = 'Wholesalers';
       // $wholesaler = Auth::user()->id;
       // $purchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->get();

       // $approvedPurchaseOrders = $this->purchaseOrders::where('wholesaler_id', $wholesaler)->where('status', 'approved')->get();
       // $retailers = $this->user::isRetailer()->get();

        $orderItems = $this->purchaseOrders::find($purchaseOrderId)->order_items;
         return $orderItems;

        //return $retailers;

       // return $purchaseOrders;
       // return view('admin.pages.wholesalers.purchaseorder', compact('pageTitle','purchaseOrders', '', 'retailers'));
    } 


}
