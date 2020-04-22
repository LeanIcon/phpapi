<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{

    private $postCategory;

    public function __construct(PostCategory $postCategory)
    {
        $this->postCategory = $postCategory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategory = $this->postCategory::all();
        $pageTitle = 'Post Category';
        return view('admin.pages.post.category.index', compact('pageTitle', 'postCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Post Category';
        return view('admin.pages.post.category.add', compact('pageTitle'));
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
        $data['slug'] = Str::slug($request->name);
        $postCategory = $this->postCategory::create($data);
        
        return redirect()->route('post_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $postCategory =  $this->postCategory::find($id);
         return view('admin.pages.post.category.show', compact('postCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postCategory =  $this->postCategory::find($id);
         return view('admin.pages.post.category.edit', compact('postCategory'));
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
        $postCategory =  $this->postCategory::find($id)->update($request->all());
        return redirect()->route('post_category.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postCategory =  $this->postCategory::find($id)->delete();
        return redirect()->route('post_category.index');
    }
}
