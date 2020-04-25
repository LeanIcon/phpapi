<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function loadDashboard()
    {
        $pageTitle = 'Nnuro Dashboard';
        return view('admin.pages.dashboard.index', compact('pageTitle'));
    }

    public function loadRetailers()
    {
        $pageTitle = 'Nnuro Dashboard';
        return view('admin.pages.dashboard.retailers', compact('pageTitle'));
    }

    public function loadWholesalers()
    {
        $pageTitle = 'Nnuro Dashboard';
        return view('admin.pages.dashboard.wholesalers', compact('pageTitle'));
    }
}
