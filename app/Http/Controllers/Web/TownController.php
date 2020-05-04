<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    private $town, $region;

    public function __construct(Town $town, Region $region)
    {
        $this->town = $town;
        $this->region = $region;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postTown = $this->town::all();
        $pageTitle = 'Town';
        return view('admin.pages.town.index', compact('pageTitle', 'postTown'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Town';
        $regions = $this->region::all();
        return view('admin.pages.town.add', compact('regions'));
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
        $town = $this->town::create($data);
        return redirect()->route('town.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $town =  $this->town::find($id);
        return view('admin.pages.town.show', compact('postTown'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $town =  $this->town::find($id);
        return view('admin.pages.town.edit', compact('postTown'));
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
        $town =  $this->town::find($id)->update($request->all());
        return redirect()->route('town.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $town =  $this->town::find($id)->delete();
        return redirect()->route('town.index');
    }
}
