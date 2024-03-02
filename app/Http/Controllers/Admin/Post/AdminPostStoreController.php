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
        try{
        $data=$request->validated();
        $tagIds=$data['tag_ids'];//забираем теги из этого массива и удаляем т.к. они будут подключаться отдельно
        unset($data['tag_ids']);//и удаляем теги из массива
        $data['preview_image']=Storage::put('/images',$data['preview_image']);//Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
        $data['main_image']=Storage::put('/images',$data['main_image']);//Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
        $post=Post::firstOrCreate($data);
        $post->tags()->attach($tagIds);
    } catch(\Exception $exception ){
        abort(404);
    }

        return redirect()->route('admin.post');
    }

}
