@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление Пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active ">Пользователи</li>
                        </ol>
                    </div><!-- /.col -->
                    <!--Create form------------------------------->
                    <form action="{{ route('admin.users.store') }}" method="POST" class="col-4">
                        @csrf
                        <div class="form-group">
                            <label class="pt-5">Пользователь</label>
                            <input type="text" class="form-control" name="name"  placeholder="Имя пользователя">
                            @error('name')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="pt-5">Электронная почта</label>
                            <input type="text" class="form-control" name="email"  placeholder="Ваша почта">
                            @error('email')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="pt-5">Пароль</label>
                            <input type="text" class="form-control" name="password"  placeholder="Придумайте пароль">
                            @error('password')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </form>
                    <!--Create end form--------------------------->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
