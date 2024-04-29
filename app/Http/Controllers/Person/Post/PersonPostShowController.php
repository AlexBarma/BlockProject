<?php

namespace App\Http\Controllers\Person\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonPostShowController extends PersonPostBaseController
{
   public function __invoke(Post $post)
   {

    return view('person.post.show',compact('post'));
   }
}
