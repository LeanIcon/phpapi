<?php

namespace App\Http\Controllers\API;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{
    public function __construct(PostCategory $postCategory)
    {
        parent::__construct($postCategory);
    }
}
