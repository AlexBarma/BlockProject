@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active ">Посты</li>
                        </ol>
                    </div><!-- /.col -->
                    <!--Create form------------------------------->
                    <form action="{{ route('admin.post.store') }}" method="POST" class="col-4"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="pt-5">Посты</label>
                            <input type="text" class="form-control" name="title" placeholder="Название поста"
                                value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group " style="width: 800px;">
                            <label class="pt-2 d-block">Контент</label>
                            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group " style="width: 800px;">
                            <label for="exampleInputFile">Добавить превью изображение</label>
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
                                        {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                    </form>
                    <!--Create end form--------------------------->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
