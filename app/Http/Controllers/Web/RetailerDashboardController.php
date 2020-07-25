<?php

namespace App\Http\Controllers\Web;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOrders;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;

class RetailerDashboardController extends Controller
{
 
    public function __construct(PurchaseOrders $purchaseOrders, User $user, UserDetails $userDetails)
    {
        $this->middleware('auth');
        $this->middleware(['role:Retailer|Wholesaler']);
        $this->middleware('check-pin');
        $this->purchaseOrders = $purchaseOrders;
        $this->user = $user;
        $this->userDetails = $userDetails;
    }
    public function loadDashboard()
    {
        $pageTitle = 'Retailers';
        $retailer = Auth::user();
        $purchaseInvoices = $retailer->retailer_orders->where('invoice', '!=', '');
        $purchaseOrders = $retailer->retailer_orders;
        $approvedPurchaseOrders = $this->purchaseOrders::where('retailer_id', $retailer)->where('status', 'approved')->get();
        $invoiceReceived = $this->purchaseOrders::where('retailer_id', $retailer)->where('invoice', '!=', null)->get();

        $proforminvoices = collect($retailer->retailer_orders)->where('order_type', 'pro_forma');

        $shortageList = $retailer->shortage;
        if(is_null($shortageList)) {
            $data = [];
        }else{
            $data = json_decode($shortageList->content, true);
        }
        $shortageList =  collect($data);
        $wholesalers = $this->user::isWholeSaler()->get();
        $userDetails = $this->userDetails->get();
        return view('admin.pages.retailers.dashboard', compact('pageTitle', 'purchaseOrders','approvedPurchaseOrders', 'wholesalers', 'retailer', 'invoiceReceived', 'shortageList', 'purchaseInvoices','proforminvoices','userDetails'));
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
        $pageTitle = 'Order Details';
        $retailer = Auth::user()->id;
        $purchaseOrders = $this->purchaseOrders::where('retailer_id', $retailer)->get();
        $wholesalers = $this->user::isWholeSaler()->get();
        return view('admin.pages.retailers.order_details', compact('pageTitle','orderItems','purchaseOrders'));
    }
    public function WholesalerpurchaseOrderDetails($purchaseOrderId = null)
    {
        $orderItems = $this->purchaseOrders::find($purchaseOrderId)->order_items;
        $pageTitle = 'Order Details';
        return view('admin.pages.wholesalers.purchaseorder', compact('pageTitle','orderItems'));
    }
}
