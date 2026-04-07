<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\MovieControllerNe;
use Illuminate\Support\Facades\Route;

/*Route::get('/', [App\Http\Controllers\MovieController::class, 'index']); */

/*Route::get('/', [MovieControllerNe::class, 'index']);

Route::get('/theloai/{id}', [MovieControllerNe::class, 'theloai']);

Route::get('/chitiet/{id}', [MovieControllerNe::class, 'chitiet']);

Route::match(['get', 'post'], '/timkiem', [MovieControllerNe::class, 'search']);

Route::get('/quanlyphim', [AdminMovieController::class, 'index']); */

// Route tương thích theo URL đang dùng trong view quản lý phim
/*Route::get('/movies/{id}', [MovieControllerNe::class, 'chitiet']);
Route::put('/movies/delete/{id}', [AdminMovieController::class, 'destroy']);

// Có thể giữ URL chi tiết cũ nếu cần truy cập trực tiếp từ trang quản lý
Route::get('/quanlyphim/{id}', [MovieControllerNe::class, 'chitiet']); */

Route::get('/chitiet/{id}', [MovieControllerNe::class, 'chitiet']);