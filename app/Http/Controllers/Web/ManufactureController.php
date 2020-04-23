<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    private $postManufacture;

    public function __construct(Manufacture $postManufacture)
    {
        $this->postManufacture = $postManufacture;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postManufacture = $this->postManufacture::all();
        $pageTitle = 'Manufacturer';
        return view('admin.pages.manufacture.index', compact('pageTitle', 'postManufacture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Manufacturer';
         return view('admin.pages.manufacture.add');
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
        $postManufacture = $this->postManufacture::create($data);
        
        return redirect()->route('manufacture.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postManufacture =  $this->postManufacture::find($id);
        return view('admin.pages.manufacture.show', compact('postManufacture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postManufacture =  $this->postManufacture::find($id);
        return view('admin.pages.manufacture.edit', compact('postManufacture'));
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
        $postManufacture =  $this->postManufacture::find($id)->update($request->all());
        return redirect()->route('manufacture.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postManufacture =  $this->postManufacture::find($id)->delete();
        return redirect()->route('manufacture.index');
    }
}
