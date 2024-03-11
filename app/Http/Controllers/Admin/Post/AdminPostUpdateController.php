<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\UpdateRequest;

class AdminPostUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,Post $post)
    {
        $data = $request->validated();
        $tagIds=$data['tag_ids'];//забираем теги из этого массива и удаляем т.к. они будут подключаться отдельно
        unset($data['tag_ids']);//и удаляем теги из массива
        $data['preview_image']=Storage::disk('public')->put('/images',$data['preview_image']);//Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
        $data['main_image']=Storage::disk('public')->put('/images',$data['main_image']);//Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
        $post->update($data);
        $post->tags()->sync($tagIds);//sinc($tagIds) удаляет все привязки тегов что были ранее и привязывает обновленные теги

        return redirect()->route('admin.post.show', $post->id);
    }
}
