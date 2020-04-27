<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WholesalerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
    }
    public function loadDashboard()
    {
        $pageTitle = 'Wholesalers';
        return view('admin.pages.wholesalers.dashboard', compact('pageTitle'));
    }


    public function loadProducts()
    {
        return view('admin.pages.wholesalers.products');
    }
}
