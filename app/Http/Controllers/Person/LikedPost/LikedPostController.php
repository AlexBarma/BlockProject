<?php

namespace App\Http\Controllers\Person\LikedPost;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikedPostController extends Controller
{
    public function __invoke()
    {
        $posts=Post::all();
        return view('person.liked_post.index',compact('posts'));
}
};
