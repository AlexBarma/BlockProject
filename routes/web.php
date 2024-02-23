<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\AdminMainController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
use App\Http\Controllers\Admin\Category\AdminCategoryCreateController;


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

Route::group(['namespace'=>'App\Http\Controllers\Admin','prefix'=>'admin'],function(){
    Route::group(['namespace'=>'Main'],function(){
        Route::get('/',AdminMainController::class);
    });
    Route::group(['namespace'=>'Category','prefix'=>'categories'],function(){
        Route::get('/',AdminCategoryController::class)->name('admin.category');
        Route::get('/create',AdminCategoryCreateController::class)->name('admin.category.create');
    });
});
