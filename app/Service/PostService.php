<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PostService
{

    public function store($data)
    {

        try {

            Db::beginTransaction();
            $tagIds = $data['tag_ids']; //забираем теги из этого массива и удаляем т.к. они будут подключаться отдельно
            unset($data['tag_ids']); //и удаляем теги из массива
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']); //Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']); //Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $post)
    {
        try {

            Db::beginTransaction();
            $tagIds = $data['tag_ids']; //забираем теги из этого массива и удаляем т.к. они будут подключаться отдельно
            unset($data['tag_ids']); //и удаляем теги из массива
            //isset($data['preview_image']) Функция которая возвращает значение true, если картинка существует в БД, и false в противном случае.
            if(isset($data['preview_image'])){
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']); //Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
            };
            if(isset($data['main_image'])){
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']); //Добавляем изображения в папку Storage , а в базу данных кладем путь к этому изображению
            };
            $post->update($data);
            $post->tags()->sync($tagIds); //sinc($tagIds) удаляет все привязки тегов что были ранее и привязывает обновленные теги
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}
