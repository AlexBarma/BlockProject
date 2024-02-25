<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;

class AdminCategoryUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category.show', $category->id);
    }
}
