<?php

namespace App\Http\Controllers\Api;

use App\TagEntity;
use JWTAuth;
use App\Http\Controllers\ApiController;

class TagEntityController extends ApiController
{
    public function __construct(TagEntity $tag)
    {
        parent::__construct($tag);
        $this->middleware('jwt.auth');
    }
}
