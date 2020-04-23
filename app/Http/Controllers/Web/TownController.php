<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    private $postTown;

    public function __construct(Town $postTown)
    {
        $this->postTown = $postTown;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postTown = $this->postTown::all();
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
        return view('admin.pages.town.add');
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
        $postTown = $this->postTown::create($data);
        
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
        $postTown =  $this->postTown::find($id);
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
        $postTown =  $this->postTown::find($id);
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
        $postTown =  $this->postTown::find($id)->update($request->all());
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
        $postTown =  $this->postTown::find($id)->delete();
        return redirect()->route('town.index');
    }
}
