<?php

namespace App\Http\Controllers\Web;

use App\Models\Town;
use App\Models\Region;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    public $location;
    public function __construct(Location $location, Region $region)
    {
        $this->location = $location;
        $this->region = $region;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = $this->location::all();
        $pageTitle = 'Locations';
       
        return view('admin.pages.location.index', compact('pageTitle', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Location';
        $regions = $this->region::all();
        return view('admin.pages.location.add', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        $town = $this->location::create($data);
        Alert::success('Success',$request->name.' added sucessfully');
        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Location';
        $regions = $this->region::all();
        $location=$this->location::find($id); 
        return view('admin.pages.location.edit', compact('regions','location','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location =  $this->location::find($id)->update($request->all());
        Alert::success('Success',$request->name.' edited sucessfully');
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLocations($regID)
    {
         $locationsX=Location::where('region_id',$regID)->get();
        
        // $locationsX=Town::all();
        // return json_encode($locationsX);
        return response()->json($locationsX); 

    }
     
}
