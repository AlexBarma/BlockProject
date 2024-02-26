<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPostCreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.post.create');
}
};
