<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function loadDashboard()
    {
        return view('admin.pages.dashboard.index');
    }
}
