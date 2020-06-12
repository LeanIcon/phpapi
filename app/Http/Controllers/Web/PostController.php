<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public $pageTitle = 'Post';
    public $postCategory;
    public function __construct(PostCategory $postCategory, Post $post)
    {
        $this->postCategory = $postCategory;
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Post';
        $posts = $this->post::all();

        // return $posts;
        // $postCategory = $this->postCategory::all();
        return view('admin.pages.post.index', compact('pageTitle', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Post';
        $postCategory = $this->postCategory::all();
        return view('admin.pages.post.add',  compact('pageTitle', 'postCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('post_image')) {
            $img = $this->uploadImage($request);
            $request['image'] =  $img['image_url'];
        }
        $request['slug'] = Str::slug($request->title);
        $data = $request->all();
        $request->user()->posts()->create($data);

        return redirect()->route('post.index');
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
        //
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

    public function uploadImage(Request $request)
    {
            $image = $request->file('post_image');
            $name = time()."_".$request->file('post_image')->getClientOriginalName();
            $image_name = $request->file('post_image')->getRealPath();

            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

            $uploaded = $image->move(\public_path("uploads"), $name);

            return [
                'status' => 200,
                'response' => 'Image Uploaded Successfully',
                'image_url' => $image_url,
                'image_path' => "public\uploads",
                'name' => $name
            ];
    }
}
