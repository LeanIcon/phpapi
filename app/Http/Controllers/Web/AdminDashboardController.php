<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Product;

class AdminDashboardController extends Controller
{
    public function __construct(User $user, Product $product)
    {
        $this->middleware('check-pin');
        $this->middleware(['role:Admin']);
        $this->user = $user;
        $this->product = $product;
    }
    //

    public function index()
    {
        $retailers = $this->user::isRetailer()->get();
        $wholesalers = $this->user::isWholesaler()->get();
        $products = $this->product::all();
        $pageTitle = 'Nnuro Dashboard';
        //return $products;
        return view('admin.pages.dashboard.index', compact('pageTitle', 'retailers', 'wholesalers', 'products'));
    }
}
