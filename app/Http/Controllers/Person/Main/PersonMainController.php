<?php

namespace App\Http\Controllers\Person\Main;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonMainController extends Controller
{
    public function __invoke()
    {
        $data=[];
        $data['postsCount']=Post::all()->count();
        return view('person.main.index',compact('data'));
}
};
