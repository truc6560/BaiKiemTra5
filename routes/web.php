<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\MovieControllerNe;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MovieController@index');
Route::get('/theloai/{id}', 'App\Http\Controllers\MovieController@theloai');
Route::post('/movieview', 'App\Http\Controllers\MovieController@movieview')->name('movieview');
Route::get('/chitiet/{id}', [MovieControllerNe::class, 'chitiet']);
Route::match(['get', 'post'], '/timkiem', [App\Http\Controllers\MovieController::class, 'TimKiem']);

