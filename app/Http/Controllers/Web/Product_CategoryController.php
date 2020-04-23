<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class Product_CategoryController extends Controller
{
    private $postProduct_Category;

    public function __construct(Category $postProduct_Category)
    {
        $this->postProduct_Category = $postProduct_Category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postProduct_Category = $this->postProduct_Category::all();
        $pageTitle = 'Product Category';
        return view('admin.pages.product_category..index', compact('pageTitle', 'postProduct_Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Product Category';
        return view('admin.pages.product_category.add');
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
        $postProduct_Category = $this->postProduct_Category::create($data);
        
        return redirect()->route('product_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postProduct_Category =  $this->postProduct_Category::find($id);
        return view('admin.pages.product_category.show', compact('postProduct_Category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postProduct_Category =  $this->postProduct_Category::find($id);
         return view('admin.pages.product_category.edit', compact('postProduct_Category'));
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
        $postProduct_Category =  $this->postProduct_Category::find($id)->update($request->all());
        return redirect()->route('product_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postProduct_Category =  $this->postProduct_Category::find($id)->delete();
        return redirect()->route('product_category.index');
    }
}
