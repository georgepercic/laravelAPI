<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\ApiController;
use App\Http\Requests;

class CommentController extends ApiController
{
    /**
     * @param Comment $comment
     * @throws \Exception
     */
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
        $this->middleware('jwt.auth');
    }
}
