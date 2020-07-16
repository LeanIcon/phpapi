<?php

namespace App\Http\Controllers\Web;

 
use App\PostAdvert;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;


class PostAdvertController extends Controller
{  
     
    public $postadvert;
    public function __construct(PostAdvert $postadvert)
    {
        
        $this->advert = $postadvert;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Adverts';
        $postadvert = PostAdvert::all();
        return view('admin.pages.postadvert.index',compact('pageTitle','postadvert'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Adverts';
        return view('admin.pages.postadvert.add', compact('pageTitle'));
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
        $pageTitle = 'Advert';
        $postadvert = PostAdvert::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$request->post_image,
           
        ]); 
        return redirect()->route('postadvert.index');
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
