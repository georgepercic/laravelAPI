<?php

namespace App\Http\Controllers\Api;

use App\ActivityLog;
use App\Http\Controllers\ApiController;
use App\Http\Requests;

class ActivityLogController extends ApiController
{
    /**
     * @param ActivityLog $log
     * @throws \Exception
     */
    public function __construct(ActivityLog $log)
    {
        parent::__construct($log);
        $this->middleware('jwt.auth');
    }
}
