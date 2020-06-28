<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Models\Location;
use App\Models\Region;
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
        //return $wholesaler;
        return view('admin.pages.retailers.wholesalers',compact('wholesalers'));
    }


    public function show($wholesalerId)
    {
        $wholesaler = $this->user::isWholeSaler()->where('id', $wholesalerId)->first();
        $products = $wholesaler->products;
        $details = $wholesaler->details;
        $regions =Region::all();
        $selectedRegion=Region::where('id','=',$details->town_id)->get(); 
        $locations=Location::where('region_id','=',$details->town_id)->get();
        //return $locations;
        return view('admin.pages.retailers.wholesaler_details', compact('wholesaler','products', 'details','locations','selectedRegion','regions'));
    }
}
