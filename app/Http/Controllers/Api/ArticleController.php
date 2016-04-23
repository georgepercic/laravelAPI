<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use App\Article;

class ArticleController extends ApiController
{
    public function __construct(Article $article)
    {
        parent::__construct($article);
        $this->middleware('jwt.auth');
    }
}
