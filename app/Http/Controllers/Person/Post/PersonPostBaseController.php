<?php

namespace App\Http\Controllers\Person\Post;


use App\Service\PostService;
use App\Http\Controllers\Controller;


class PersonPostBaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
};
