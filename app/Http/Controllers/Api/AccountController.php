<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiControllerTrait;

class AccountController extends Controller
{
    use ApiControllerTrait;

    protected $model;
    protected $relationships = ['bank'];

    public function __construct(\App\Account $model)
    {
        $this->model = $model;
    }
}
