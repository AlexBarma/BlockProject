<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPostCreateController extends Controller
{
    public function __invoke()
    {
        $categories=Category::all();
        return view('admin.post.create',compact('categories'));
}
};
