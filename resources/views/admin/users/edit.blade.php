@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active ">Пользователи</li>
                        </ol>
                    </div><!-- /.col -->
                    <!--Create form------------------------------->
                    <form action="{{ route('admin.users.update',$user->id) }}" method="POST" class="col-4">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label class="pt-5">Пользователь</label>

                                <input type="text" class="form-control" name="name" placeholder="Имя пользователя "
                                    value="{{ $user->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                        </div>
                        <div class="form-group">
                            <label class="pt-5">Электронная почта</label>

                                <input type="text" class="form-control" name="email" placeholder="Ваша почта"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                        </div>
                        <div class="form-group">
                            <label>Выберите роль</label>
                            <select name="role" class="form-control">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == $user->role ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endforeach

                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Изменить">
                    </form>
                    <!--Create end form--------------------------->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
