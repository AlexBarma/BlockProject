<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoryCreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.category.create');
}
};
