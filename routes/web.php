<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieControllerhihi;

// Trang quản lý
Route::get('/admin', [MovieControllerhihi::class, 'admin']);

// Route xử lý xóa (Sửa thành GET và dùng đúng class MovieControllerhihi)
Route::delete('/movies/{id}', [MovieControllerhihi::class, 'destroy']);