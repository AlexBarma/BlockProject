<?php

namespace App\Http\Controllers\Person\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonCommentDestroyController extends Controller
{
    public function __invoke(Comment $comment)
    {
       $comment->delete() ;
       return redirect()->route('person.comment');
    }
}
