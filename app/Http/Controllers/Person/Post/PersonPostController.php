<?php

namespace App\Http\Controllers\Person\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PersonPostController extends PersonPostBaseController
{
    public function __invoke()
    {
        $posts=Post::all();
        return view('person.post.index',compact('posts'));
}
};
