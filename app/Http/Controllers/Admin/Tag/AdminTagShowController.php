<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTagShowController extends Controller
{
   public function __invoke(Tag $tag)
   {

    return view('admin.tags.show',compact('tag'));
   }
}
