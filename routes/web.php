<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Tag\AdminTagController;
use App\Http\Controllers\Admin\Main\AdminMainController;
use App\Http\Controllers\Admin\Post\AdminPostController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Tag\AdminTagEditController;
use App\Http\Controllers\Admin\Tag\AdminTagShowController;
use App\Http\Controllers\Admin\Tag\AdminTagStoreController;
use App\Http\Controllers\Admin\Post\AdminPostEditController;
use App\Http\Controllers\Admin\Post\AdminPostShowController;
use App\Http\Controllers\Admin\Tag\AdminTagCreateController;
use App\Http\Controllers\Admin\Tag\AdminTagUpdateController;
use App\Http\Controllers\Admin\User\AdminUserEditController;
use App\Http\Controllers\Admin\User\AdminUserShowController;
use App\Http\Controllers\Admin\Post\AdminPostStoreController;
use App\Http\Controllers\Admin\Tag\AdminTagDestroyController;
use App\Http\Controllers\Admin\User\AdminUserStoreController;
use App\Http\Controllers\Admin\Post\AdminPostCreateController;
use App\Http\Controllers\Admin\Post\AdminPostUpdateController;
use App\Http\Controllers\Admin\User\AdminUserCreateController;
use App\Http\Controllers\Admin\User\AdminUserUpdateController;
use App\Http\Controllers\Admin\Post\AdminPostDestroyController;
use App\Http\Controllers\Admin\User\AdminUserDestroyController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
use App\Http\Controllers\Admin\Category\AdminCategoryEditController;
use App\Http\Controllers\Admin\Category\AdminCategoryShowController;
use App\Http\Controllers\Admin\Category\AdminCategoryStoreController;
use App\Http\Controllers\Admin\Category\AdminCategoryCreateController;
use App\Http\Controllers\Admin\Category\AdminCategoryUpdateController;
use App\Http\Controllers\Admin\Category\AdminCategoryDestroyController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'App\Http\Controllers\Main'],function(){
    Route::get('/',IndexController::class);
});

//Admin panel
Route::group(['namespace'=>'App\Http\Controllers\Admin','prefix'=>'admin' , 'middleware'=>['auth','admin']],function(){
    Route::group(['namespace'=>'Main'],function(){
        Route::get('/',AdminMainController::class)->name('admin.main');
    });
    //Create Post
    Route::group(['namespace'=>'Post','prefix'=>'posts'],function(){
        Route::get('/',AdminPostController::class)->name('admin.post');
        Route::get('/create',AdminPostCreateController::class)->name('admin.post.create');
        Route::post('/',AdminPostStoreController::class)->name('admin.post.store');
        Route::get('/{post}',AdminPostShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit',AdminPostEditController::class)->name('admin.post.edit');
        Route::patch('/{post}',AdminPostUpdateController::class)->name('admin.post.update');
        Route::delete('/{post}',AdminPostDestroyController::class)->name('admin.post.destroy');
    });
    //Create Category
    Route::group(['namespace'=>'Category','prefix'=>'categories'],function(){
        Route::get('/',AdminCategoryController::class)->name('admin.category');
        Route::get('/create',AdminCategoryCreateController::class)->name('admin.category.create');
        Route::post('/',AdminCategoryStoreController::class)->name('admin.category.store');
        Route::get('/{category}',AdminCategoryShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit',AdminCategoryEditController::class)->name('admin.category.edit');
        Route::patch('/{category}',AdminCategoryUpdateController::class)->name('admin.category.update');
        Route::delete('/{category}',AdminCategoryDestroyController::class)->name('admin.category.destroy');
    });
    //Create Tag
    Route::group(['namespace'=>'Tag','prefix'=>'tags'],function(){
        Route::get('/',AdminTagController::class)->name('admin.tags');
        Route::get('/create',AdminTagCreateController::class)->name('admin.tags.create');
        Route::post('/',AdminTagStoreController::class)->name('admin.tags.store');
        Route::get('/{tag}',AdminTagShowController::class)->name('admin.tags.show');
        Route::get('/{tag}/edit',AdminTagEditController::class)->name('admin.tags.edit');
        Route::patch('/{tag}',AdminTagUpdateController::class)->name('admin.tags.update');
        Route::delete('/{tag}',AdminTagDestroyController::class)->name('admin.tags.destroy');
    });
    //Create Users
    Route::group(['namespace'=>'User','prefix'=>'users'],function(){
        Route::get('/',AdminUserController::class)->name('admin.users');
        Route::get('/create',AdminUserCreateController::class)->name('admin.users.create');
        Route::post('/',AdminUserStoreController::class)->name('admin.users.store');
        Route::get('/{user}',AdminUserShowController::class)->name('admin.users.show');
        Route::get('/{user}/edit',AdminUserEditController::class)->name('admin.users.edit');
        Route::patch('/{user}',AdminUserUpdateController::class)->name('admin.users.update');
        Route::delete('/{user}',AdminUserDestroyController::class)->name('admin.users.destroy');
    });
});
