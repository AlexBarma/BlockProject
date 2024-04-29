<?php

namespace App\Http\Controllers\Person\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PersonPostStoreController extends PersonPostBaseController
{
    public function __invoke(StoreRequest $request){
        $data=$request->validated();
        $this->service->store($data);

        return redirect()->route('person.post');
    }

}
