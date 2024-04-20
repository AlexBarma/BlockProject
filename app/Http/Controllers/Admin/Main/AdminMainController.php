<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMainController extends Controller
{
    public function __invoke()
    {
        $data=[];
        $data['usersCount']=User::all()->count();
        $data['postsCount']=Post::all()->count();
        $data['categoryCount']=Category::all()->count();
        $data['tagCount']=Tag::all()->count();
        return view('admin.main.index',compact('data'));
}
};
