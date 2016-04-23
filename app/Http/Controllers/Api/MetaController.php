<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use App\Meta;

class MetaController extends ApiController
{
    /**
     * @param Meta $meta
     * @throws \Exception
     */
    public function __construct(Meta $meta)
    {
        parent::__construct($meta);
        $this->middleware('jwt.auth');
    }
}
