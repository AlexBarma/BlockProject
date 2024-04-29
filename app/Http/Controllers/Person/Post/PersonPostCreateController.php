<?php

namespace App\Http\Controllers\Person\Post;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonPostCreateController extends PersonPostBaseController
{
    public function __invoke()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('person.post.create',compact('categories','tags'));
}
};
