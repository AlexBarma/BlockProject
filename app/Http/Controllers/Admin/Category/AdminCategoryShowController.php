<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoryShowController extends Controller
{
   public function __invoke(Category $category)
   {

    return view('admin.categories.show',compact('category'));
   }
}
