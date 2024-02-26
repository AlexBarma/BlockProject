<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;

class AdminPostStoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data=$request->validated();
        Post::firstOrCreate($data);
        return redirect()->route('admin.post');
    }

}
