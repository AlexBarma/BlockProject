<?php

namespace App\Http\Controllers\Person\LikedPost;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;

class LikedPostDestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('person.liked_post');
    }
}
