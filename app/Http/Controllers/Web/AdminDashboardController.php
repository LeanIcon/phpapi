<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-pin');
        $this->middleware(['role:Admin']);
    }
    //

    public function index()
    {
        $pageTitle = 'Nnuro Dashboard';
        return view('admin.pages.dashboard.index', compact('pageTitle'));
    }
}
