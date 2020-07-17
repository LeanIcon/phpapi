<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Models\Location;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RetailerWholesalersController extends Controller
{
    
    public function __construct(User $user, Location $locations)
    {
        $this->middleware('auth');
        $this->middleware(['role:Retailer|Admin']);
        $this->user = $user;
        $this->locations  = $locations;
    }

    public function index()
    {
        $wholesalers = $this->user::isWholeSaler()->get();
        //return $wholesaler;
        return view('admin.pages.retailers.wholesalers',compact('wholesalers'));
    }


    public function show($wholesalerId)
    {
        // $wholesaler = $this->user::isWholeSaler()->where('id', $wholesalerId)->first();

        $wholesaler = $this->user::find($wholesalerId);
        $products = $wholesaler->products;
        $details = $wholesaler->details;

        $regions = $this->locations::find($details->town_id)->region;
        $locations = $this->locations::find($details->town_id);

        // $regions =Region::all();
        $selectedRegion=Region::where('id','=',$details->town_id)->get();
        $locations=Location::where('region_id','=',$details->town_id)->get();
        //return $selectedRegion;
        return view('admin.pages.retailers.wholesaler_details', compact('wholesaler','products', 'details','locations','selectedRegion','regions'));
    }

    public function showRetailer($retailerId)
    {
        $retailer=$this->user::find($retailerId);
        $details=$retailer->details; 
        $locations = $this->locations::find($details->town_id);

        // $regions =Region::all();
        $selectedRegion=Region::where('id','=',$details->town_id)->get();
        $locations=Location::where('region_id','=',$details->town_id)->get();
        return view('admin.pages.retailers.retailer_details', compact('details','locations','selectedRegion','retailer'));
    }
}
