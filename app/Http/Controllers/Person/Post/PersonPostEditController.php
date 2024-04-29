<?php

namespace App\Http\Controllers\Person\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonPostEditController extends PersonPostBaseController
{
    public function __invoke(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('person.post.edit',compact('post','categories','tags'));
    }
}
