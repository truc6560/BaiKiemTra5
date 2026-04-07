<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'PhimTheoTheLoai']);
Route::match(['get', 'post'], '/timkiem', [App\Http\Controllers\MovieController::class, 'TimKiem']);