<?php

namespace App\Http\Controllers\Api;

use App\Block;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests;

class BlockController extends ApiController
{
    /**
     * @param Block $block
     * @throws \Exception
     */
    public function __construct(Block $block)
    {
        parent::__construct($block);
        $this->middleware('jwt.auth');
    }
}
