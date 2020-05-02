<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetailerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
    }
    public function loadDashboard()
    {
        $pageTitle = 'Retailers';
        return view('admin.pages.retailers.dashboard', compact('pageTitle'));
    }

    public function loadPurchaseOrderList()
    {
        $pageTitle = "Purchase List";
        return view('admin.pages.retailers.purchase_order-list', compact('pageTitle'));
    }
}
