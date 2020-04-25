<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetailerDashboardController extends Controller
{
    public function loadDashboard()
    {
        $pageTitle = 'Retailers';
        return view('admin.pages.retailers.dashboard', compact('pageTitle'));
    }
}
