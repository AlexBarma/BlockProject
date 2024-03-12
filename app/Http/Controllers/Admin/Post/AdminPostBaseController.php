<?php

namespace App\Http\Controllers\Admin\Post;


use App\Service\PostService;
use App\Http\Controllers\Controller;


class AdminPostBaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
};
