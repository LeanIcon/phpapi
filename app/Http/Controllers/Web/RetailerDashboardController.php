<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RetailerDashboardController extends Controller
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
    }
    public function loadDashboard()
    {
        $pageTitle = 'Retailers';
        $wholesalers = $this->user->isWholeSaler()->get();
        return view('admin.pages.retailers.dashboard', compact('pageTitle', 'wholesalers'));
    }

    public function loadPurchaseOrderList()
    {
        $pageTitle = "Purchase List";
        return view('admin.pages.retailers.purchase_order-list', compact('pageTitle'));
    }
}
