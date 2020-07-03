<?php

namespace App\Http\Controllers\Web;

use App\User;

use App\Models\Region;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $user; 
    public function __construct(User $user )
    {
        $this->user = $user; 
        $this->middleware('auth');
        $this->middleware('check-pin');
    }

    public function dashboard()
    {
        $authUser = Auth::user();

        if ($authUser->hasRole('Admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($authUser->hasRole('Retailer')) {
           return redirect()->route('retailer.dashboard');
        }
        if ($authUser->hasRole('Wholesaler')) {
           return redirect()->route('wholesaler.dashboard');
        }
        abort(404);
    }

    public function loadWholesaler()
    {
        $pageTitle = 'Admin Dashboard';
        $wholesalers = $this->user->isWholeSaler()->get(); 
        $regions = Region::all(); 
        $locations=Location::all();
        return view('admin.pages.dashboard.wholesalers', compact('pageTitle', 'wholesalers','regions','locations'));
    }

    public function loadRetailer()
    {
        $pageTitle = 'Admin Dashboard';
        $retailers = $this->user->isRetailer()->get();
        $regions=Region::all();
        $locations=Location::all();
        return view('admin.pages.dashboard.retailers', compact('pageTitle', 'retailers','regions','locations'));
    }

    public function loadDashboard()
    {
        $pageTitle = 'Nnuro Dashboard';
        return view('admin.pages.dashboard.index', compact('pageTitle'));
    }

}
