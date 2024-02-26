<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;

class AdminPostUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('admin.post.show', $post->id);
    }
}
