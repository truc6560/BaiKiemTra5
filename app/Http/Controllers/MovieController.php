<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller {

    // --- PHẦN CHO NGƯỜI DÙNG XEM ---

    public function index() {
        $data = DB::select("select * from movie where popularity > 450 and vote_average > 7 order by release_date desc limit 0,12");
        $theloai = DB::select("select * from genre");
        return view("movie.index", compact("data", "theloai"));
    }
    public function theloai($id) {
    $data = DB::select(
        "SELECT movie.* FROM movie 
        JOIN movie_genre ON movie.id = movie_genre.id_movie 
        WHERE movie_genre.id_genre = ?
        ORDER BY movie.release_date DESC
        LIMIT 0,12
        ", [$id]);

    $theloai = DB::select("select * from genre");

    return view('movie.index', [
        'data' => $data,
        'theloai' => $theloai,
        'title' => 'Phim theo thể loại'
    ]);
}
    public function movieview(Request $request) {
    $id_the_loai = $request->input("the_loai");

    if($id_the_loai != "") {
        $data = DB::select("
            SELECT movie.* FROM movie 
            JOIN movie_genre ON movie.id = movie_genre.id_movie 
            WHERE movie_genre.id_genre = ? 
            ORDER BY movie.release_date DESC 
            LIMIT 0,12
        ", [$id_the_loai]);
    } else {
        $data = DB::select("SELECT * FROM movie WHERE popularity > 450 AND vote_average > 7 ORDER BY release_date DESC LIMIT 0,12");

    }
    
    return view("movie.movie_view", compact("data"));
}