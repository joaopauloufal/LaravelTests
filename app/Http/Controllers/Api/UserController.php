<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiControllerTrait;


class UserController extends Controller
{
    use ApiControllerTrait;
    protected $model;
    protected $relationships = [];

    public function __construct(\App\User $model)
    {
        $this->model = $model;
    }
}
