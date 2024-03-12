<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPostShowController extends AdminPostBaseController
{
   public function __invoke(Post $post)
   {

    return view('admin.post.show',compact('post'));
   }
}
