<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieControllerhihi extends Controller
{
    public function index()
    {
        // Điều kiện: popularity > 450, vote > 7, sắp xếp release_date giảm dần [cite: 5]
        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        return view("movie.index", [
            'movies' => $movies,
            'title' => 'Trang chủ - MovieDB'
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // Câu lệnh lấy thông tin bộ phim dựa vào từ khóa tìm kiếm [cite: 13, 14]
        $movies = DB::select("select * from movie where movie_name_vn like ?", ["%".$keyword."%"]);
        
        return view("movie.index", [
            'movies' => $movies,
            'title' => 'Kết quả tìm kiếm: ' . $keyword
        ]);
    }

    // Thêm vào MovieController.php
public function admin() {
    // Chỉ lấy các bộ phim có status bằng 1 
    $movies = DB::table('movie')->where('status', 1)->get();
    return view('movie.admin', [
        'movies' => $movies,
        'title' => 'Quản lý danh sách phim'
    ]);
}


public function destroy($id) {
    // Cập nhật status thành 0 (Xóa mềm) 
    \Illuminate\Support\Facades\DB::table('movie')
        ->where('id', $id)
        ->update(['status' => 0]);
        
    return redirect()->back()->with('success', 'Đã xóa phim thành công.');
}
}