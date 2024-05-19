<?php

namespace App\Http\Controllers\Main\Post;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at); //Carbon - метод создающий текущую дату ииспользуя базу данных
        $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id','!=', $post->id)
        ->get()
        ->take(3);
        return view('main.post.show',compact('post','date','relatedPosts'));

}
};
