<?php

namespace App\Http\Controllers\Web;

use App\Models\DrugClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DrugClassController extends Controller
{
    public $drugClass;
    public function __construct(DrugClass $drugClass)
    {
        $this->drugClass = $drugClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugClass = $this->drugClass::all();
        $pageTitle="Drug Class";
        return view('admin.pages.drug.drug_class', compact('drugClass','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drugClass = $this->drugClass::create($request->all());
        Alert::success('Success',$request->name.' added sucessfully');
        return redirect()->route('drug_class.index');
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
        //
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
        $drug = $this->drugClass::find($id)->update($request->all());
        Alert::success('Success',$request->name.' edited sucessfully');
        return redirect()->route('drug_class.index');
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
}
