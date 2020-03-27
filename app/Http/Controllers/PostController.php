<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    private $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
        parent::__construct($post);
    }


    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->title);

        $data = $this->post::create($request->all());
        return $data;
    }

}
