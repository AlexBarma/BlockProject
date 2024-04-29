<?php

namespace App\Http\Controllers\Person\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PersonPostDestroyController extends PersonPostBaseController
{
    public function __invoke(Post $post)
    {
       $post->delete() ;
       return redirect()->route('person.post');
    }
}
