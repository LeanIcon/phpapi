<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}
