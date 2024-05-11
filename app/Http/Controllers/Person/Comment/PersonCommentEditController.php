<?php

namespace App\Http\Controllers\Person\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class PersonCommentEditController extends Controller
{
    public function __invoke(Comment $comment)
    {

        return view('person.comment.edit',compact('comment'));
    }
}
