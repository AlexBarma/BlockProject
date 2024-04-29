<?php

namespace App\Http\Controllers\Person\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PersonCommentController extends Controller
{
    public function __invoke()
    {
        $categories=Category::all();
        return view('person.comment.index',compact('categories'));
}
};
