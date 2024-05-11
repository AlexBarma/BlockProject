<?php

namespace App\Http\Controllers\Person\Comment;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Person\Comment\UpdateRequest;

class PersonCommentUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        $data=$request->validated();
        $comment->update($data);
        return redirect()->route('person.comment');
    }
}
