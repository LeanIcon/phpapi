<?php

namespace App\Http\Controllers\Web;

use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    private $postRegion;

    public function __construct(Region $postRegion)
    {
        $this->postRegion = $postRegion;
    }
    /**
   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postRegion = $this->postRegion::all();
        $pageTitle = 'Region';
        return view('admin.pages.region.index', compact('pageTitle', 'postRegion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Region';
        return view('admin.pages.region.add');
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
       // $data['status'] = Str::slug($request->status);
        $postRegion = $this->postRegion::create($data);
        
        return redirect()->route('region.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postRegion =  $this->postRegion::find($id);
        return view('admin.pages.region.show', compact('postRegion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postRegion =  $this->postRegion::find($id);
         return view('admin.pages.region.edit', compact('postRegion'));
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
        $postRegion =  $this->postRegion::find($id)->update($request->all());
        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postRegion =  $this->postRegion::find($id)->delete();
        return redirect()->route('region.index');
    }

    public function getRegionDetails($regID){
        $region=Region::where('id',$regID)->get();
        return response()->json($region);
    }
     
     


}
