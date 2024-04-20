@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Посты</li>
                        </ol>
                    </div><!-- /.col -->
                    <div class="col-2 pt-5">
                        <a href="{{ route('admin.post.create') }}" type="button"
                            class="btn btn-block btn-info">Добавить</a>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список постов</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TITLE</th>
                                            <th>CONTENT</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->content }}</td>
                                                <td>{{ $post->created_at }}</td>
                                                <td><a href="{{ route('admin.post.show', $post->id) }}"><i
                                                            class="fas fa-solid fa-eye"></i></a></td>
                                                <td><a class="text-success"
                                                        href="{{ route('admin.post.edit', $post->id) }}"><i
                                                            class="fas fa-solid fa-wrench"></i></a></td>
                                                <td>
                                                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="border-0 bg-transporent" type="submit">
                                                            <i class="fas fa-solid fa-trash text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                {{-- {{ route('admin.category.edit',$category->id) }} --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
