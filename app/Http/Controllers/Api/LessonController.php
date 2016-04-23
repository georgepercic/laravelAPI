<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use App\Lesson;

class LessonController extends ApiController
{
    public function __construct(Lesson $lesson)
    {
        parent::__construct($lesson);
        $this->middleware('jwt.auth');
    }
}
