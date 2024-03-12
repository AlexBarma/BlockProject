<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostDestroyController extends AdminPostBaseController
{
    public function __invoke(Post $post)
    {
       $post->delete() ;
       return redirect()->route('admin.post');
    }
}
