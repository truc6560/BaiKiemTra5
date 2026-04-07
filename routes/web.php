<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MovieController@index');
Route::post('/movieview', 'App\Http\Controllers\MovieController@movieview')->name('movieview');
Route::get('movie/chitiet/{id}', 'App\Http\Controllers\MovieController@chitiet');
Route::post('/timkiem', 'App\Http\Controllers\MovieController@timkiem')->name('timkiem');
Route::get('/theloai/{id}', 'App\Http\Controllers\MovieController@theloai');

