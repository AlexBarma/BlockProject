@extends('person.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование комментария</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active ">Комментарии</li>
                        </ol>
                    </div><!-- /.col -->
                    <!--Create form------------------------------->
                    <form action="{{ route('person.comment.update', $comment->id) }}" method="POST" class="col-4"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group " style="width: 800px;">
                            <label class="pt-2 d-block">Контент</label>
                            <textarea class="form-control"  name="message" cols="100" rows="5">{{ $comment->message }}</textarea>
                            @error('message')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
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
