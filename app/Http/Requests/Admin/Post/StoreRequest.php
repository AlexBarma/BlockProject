<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 'category_id'=>'reguired|exists:categories,id', reguired - указывает на обязательное требование далее идет проверка совпадает и выбраннй id с id в таблице категорий
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    //

    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'required|file',
            'main_image'=>'required|file',
            'category_id'=>'required|integer|exists:App\Models\Category,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Поле заполненно не верно',
            'content.required'=>'Нужно заполненить это поле',
            'content.string'=>'Данные должны соответствовать строчному типу',
            'preview_image.required'=>'Это поле необходимо заполнить',
            'preview_image.file'=>'Необходимо выбрать файл',
            'main_image.required'=>'Поле заполненно не верно',
            'main_image.file'=>'Поле заполненно не верно',
            'category_id.integer'=>'id категории должно быть числом',
            'category_id.exists'=>'id категории должно быть в БД',
            'tag_ids.array'=>'Необходимо отпраить массив данных',
        ];
    }
}
