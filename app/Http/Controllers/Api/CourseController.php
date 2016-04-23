<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;

class CourseController extends ApiController
{
    public function __construct(Course $course)
    {
        parent::__construct($course);
        $this->middleware('jwt.auth');
    }
}
