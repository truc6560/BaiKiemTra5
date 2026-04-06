<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

// Hiển thị Form thêm phim mới
Route::get('/admin/movies/create', 'App\Http\Controllers\MovieController@create')->name('admin.movies.create');

// Xử lý lưu phim mới vào Database
Route::post('/admin/movies/store', 'App\Http\Controllers\MovieController@store')->name('admin.movies.store');

