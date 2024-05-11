<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts=Post::paginate(6);
        $randomPosts=Post::get()->random(4);
        $likedPosts=Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4); //withCount('likedUsers') - метод который считает количество значений (лайков) к кажому посту, orderBy('liked_users_count','DESC') - 'DESC' сортирует от большего числа лайков к меньшему, 'ASC' - сортирует наоборот, take(4) - выводит нужное нам количество постов
        return view('main.index',compact('posts','randomPosts', 'likedPosts'));

}
};
