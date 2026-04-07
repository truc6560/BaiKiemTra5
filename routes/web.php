<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\MovieControllerNe;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MovieController@index');
Route::get('/theloai/{id}', 'App\Http\Controllers\MovieController@theloai');
Route::post('/movieview', 'App\Http\Controllers\MovieController@movieview')->name('movieview');
Route::get('/chitiet/{id}', [MovieControllerNe::class, 'chitiet']);
Route::match(['get', 'post'], '/timkiem', [App\Http\Controllers\MovieController::class, 'TimKiem']);

// Hiển thị Form thêm phim mới
Route::get('/admin/movies/create', 'App\Http\Controllers\MovieControllerCreate@create')->name('admin.movies.create');

// Xử lý lưu phim mới vào Database
Route::post('/admin/movies/store', 'App\Http\Controllers\MovieControllerCreate@store')->name('admin.movies.store');


