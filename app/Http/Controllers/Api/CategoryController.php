<?php

namespace App\Http\Controllers\Api;

use App\Category;
use JWTAuth;
use App\Http\Controllers\ApiController;

class CategoryController extends ApiController
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->middleware('jwt.auth');
    }
}
