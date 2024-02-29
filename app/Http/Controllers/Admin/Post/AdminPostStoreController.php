<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class AdminPostStoreController extends Controller
{
    public function __invoke(StoreRequest $request){

        $data=$request->validated();
        $data['preview_image']=Storage::put('/images',$data['preview_image']);//Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
        $data['main_image']=Storage::put('/images',$data['main_image']);//Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
        Post::firstOrCreate($data);
        return redirect()->route('admin.post');
    }

}
