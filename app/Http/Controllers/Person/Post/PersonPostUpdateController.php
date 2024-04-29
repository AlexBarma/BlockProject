<?php

namespace App\Http\Controllers\Person\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Person\Post\UpdateRequest;

class PersonPostUpdateController extends PersonPostBaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);

        return redirect()->route('person.post.show', $post->id);
    }
}
