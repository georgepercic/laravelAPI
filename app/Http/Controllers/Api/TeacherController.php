<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class TeacherController extends ApiController
{
    public function __construct(Course $course)
    {
        parent::__construct($course);
        $this->middleware('jwt.auth');
    }
}
