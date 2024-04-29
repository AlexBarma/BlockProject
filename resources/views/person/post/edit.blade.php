@extends('person.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active ">Посты</li>
                        </ol>
                    </div><!-- /.col -->
                    <!--Create form------------------------------->
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="col-4"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label class="pt-5">Посты</label>
                            <input type="text" class="form-control" name="title" placeholder="Название поста"
                                value="{{ $post->title }}">
                            @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group " style="width: 800px;">
                            <label class="pt-2 d-block">Контент</label>
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                            @error('content')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group " style="width: 800px;">
                            <label for="exampleInputFile">Добавить превью изображение</label>
                            <div class="w-50 mb-2">
                                <img src="{{url('storage/'. $post->main_image)}}" alt="main_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('main_image')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                            <label for="exampleInputFile">Добавить главное изображение</label>
                            <div class="w-50 mb-2">
                                <img src="{{url('storage/'. $post->preview_image ) }}" alt="preview_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите изображение</label>

                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>

                            </div>
                            @error('preview_image')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выерите категорию</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple=""
                                data-placeholder="Выберите теги" style="width: 100%;" data-select2-id="7" tabindex="-1"
                                aria-hidden="true">
                                @foreach ($tags as $tag)
                                    <option
                                        {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                        {{-- toArray()- это метод который привоит коллекции к массивам, pluck('id') достает из таблицы конкретную колонку --}}
                                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
                    </form>
                    <!--Create end form--------------------------->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
