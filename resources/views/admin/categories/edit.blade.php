@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование категории</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active ">Категории</li>
                        </ol>
                    </div><!-- /.col -->
                    <!--Create form------------------------------->
                    <form action="{{ route('admin.category.update',$category->id) }}" method="POST" class="col-4">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label class="pt-5">Категории</label>

                                <input type="text" class="form-control" name="title" placeholder="Название категории"
                                    value="{{ $category->title }}">
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror

                        </div>
                        <input type="submit" class="btn btn-primary" value="Изменить">
                    </form>
                    <!--Create end form--------------------------->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
