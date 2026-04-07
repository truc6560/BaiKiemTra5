<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimKiemController extends Controller
{
    public function index(){
        $movies = DB::select("
            SELECT * FROM movie 
            WHERE popularity > 450 
              AND vote_average > 7 
            ORDER BY release_date DESC 
            LIMIT 0, 12
        ");
        // Lấy danh sách thể loại cho menu
        $genre = DB::select("SELECT * FROM genre");
        return view("movie.index", compact("movies", "genre"));
    }

    // Hiển thị phim theo thể loại
    public function PhimTheoTheLoai($id)
    {
        $movies = DB::select("
            SELECT m.* 
            FROM movie m
            INNER JOIN movie_genre mg ON m.id = mg.id_movie
            WHERE mg.id_genre = ?
            ORDER BY m.release_date DESC
            LIMIT 0, 12
        ", [$id]);

        // Lấy tên thể loại
        $theloai = DB::select("SELECT genre_name_vn FROM genre WHERE id = ?", [$id]);
        $genreName = $theloai ? $theloai[0]->genre_name_vn : 'Thể loại không xác định';

        // Lấy danh sách thể loại cho menu
        $genre = DB::select("SELECT * FROM genre");
    

    return view("movie.index", compact("movies", "genre", "genreName"));
    }


    public function timKiem(Request $request){
        $keyword = $request->input('keyword');
        $movies = DB::select("
            SELECT * FROM movie 
            WHERE movie_name_vn LIKE ?", ["%".$keyword."%"]);
        
        // Lấy danh sách thể loại cho menu
        $genre = DB::select("SELECT * FROM genre");
        
        // Từ khóa tìm kiếm để hiển thị
        $kqtimkiem = $keyword;
        
        return view("movie.index", compact("movies", "genre", "kqtimkiem"));
    }
}
