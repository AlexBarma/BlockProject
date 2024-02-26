<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;

class AdminTagUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('admin.tags.show', $tag->id);
    }
}
