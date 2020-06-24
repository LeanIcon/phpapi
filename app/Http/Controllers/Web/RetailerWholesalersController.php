<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RetailerWholesalersController extends Controller
{
    
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->middleware(['role:Retailer|Admin']);
        $this->user = $user;
    }

    public function index()
    {
        $wholesalers = $this->user::isWholeSaler()->get();
        return view('admin.pages.retailers.wholesalers',compact('wholesalers'));
    }


    public function show($wholesalerId)
    {
        $wholesaler = $this->user::isWholeSaler()->where('id', $wholesalerId)->first();
        $products = $wholesaler->products;
        $details = $wholesaler->details;
        return view('admin.pages.retailers.wholesaler_details', compact('wholesaler','products', 'details'));
    }
}
