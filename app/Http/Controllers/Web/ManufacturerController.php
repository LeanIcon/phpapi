<?php

namespace App\Http\Controllers\Web;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManufacturerController extends Controller
{
    public $manufacturer;
    public function __construct(Manufacturer $manufacturer)
    {
        $this->middleware('auth');
        $this->middleware(['role:Admin']);
        $this->manufacturer = $manufacturer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Manufacturers';
        $manufacturers = $this->manufacturer::all();
        return view('admin.pages.manufacture.index', compact('manufacturers', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Manufacturers';
        return view('admin.pages.manufacture.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pageTitle = 'Manufacturers';
        $manufacturer = $this->manufacturer::create($request->all());
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
        $pageTitle = 'Manufacturers';
        $manufacturers = $this->manufacturer::find($id);
        return view('admin.pages.manufacture.show', compact('manufacturers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Manufacturers';
        $manufacturer = $this->manufacturer::find($id);
        return view('admin.pages.manufacture.edit', compact('manufacturer')); 
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
        $pageTitle = 'Manufacturers';
        $manufacturers = $this->manufacturer::find($id)->update($request->all());
        return redirect()->route('manufacture.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $pageTitle = 'Manufacturers';
        $manufacturers = $this->manufacturer::find($id)->delete($request->all());
        return redirect()->route('manufacture.index');
    }
}
