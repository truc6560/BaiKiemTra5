<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

// Hiển thị Form thêm phim mới
Route::get('/admin/movies/create', 'App\Http\Controllers\MovieControllerCreate@create')->name('admin.movies.create');

// Xử lý lưu phim mới vào Database
Route::post('/admin/movies/store', 'App\Http\Controllers\MovieControllerCreate@store')->name('admin.movies.store');

