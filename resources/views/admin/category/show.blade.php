@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex flex-row mb-3 align-items-center">
                        <h1 class="m-0 p-2">{{ $category->title }}</h1>
                        <a class="text-success p-2" href="{{ route('admin.category.edit', $category->id) }}">
                            <i class="fas fa-solid fa-wrench"></i>
                        </a>
                        <form class="p-2" action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="border-0 bg-transporent" type="submit">
                                <i class="fas fa-solid fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Категории</li>
                        </ol>
                    </div><!-- /.col -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>id</td>
                                            <td>{{ $category->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>title</td>
                                            <td>{{ $category->title }}</td>
                                        </tr>
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
