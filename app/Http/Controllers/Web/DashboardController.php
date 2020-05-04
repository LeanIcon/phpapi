<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $authUser = Auth::user();

        if( $authUser->type == $this->user::IS_ADMIN)
        {
            return $this->loadDashboard();
        }
        if ($authUser->type == $this->user::IS_WHOLESALER )
        {
            return redirect()->route('wholesaler.dashboard');
        }
        if ($authUser->type == $this->user::IS_RETAILER)
        {
            return redirect()->route('retailer.dashboard');
        }
        abort(404);
    }

    public function loadWholesaler()
    {
        $pageTitle = 'Admin Dashboard';
        $wholesalers = $this->user->isWholeSaler()->get();
        return view('admin.pages.dashboard.wholesalers', compact('pageTitle', 'wholesalers'));
    }

    public function loadRetailer()
    {
        $pageTitle = 'Admin Dashboard';
        $retailers = $this->user->isRetailer()->get();
        return view('admin.pages.dashboard.retailers', compact('pageTitle', 'retailers'));
    }

    public function loadDashboard()
    {
        $pageTitle = 'Nnuro Dashboard';
        return view('admin.pages.dashboard.index', compact('pageTitle'));
    }

    // public function loadRetailerDashboard()
    // {
    //     $pageTitle = 'Nnuro Dashboard';
    //     return view('admin.pages.retailers.dashboard', compact('pageTitle'));
    // }

    // public function loadWholesalerDashboard()
    // {
    //     $pageTitle = 'Nnuro Dashboard';
    //     return view('admin.pages.wholesalers.dashboard', compact('pageTitle'));
    // }
}
