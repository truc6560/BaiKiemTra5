<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieControllerNgoc extends Controller
{
    // chi tiết movie
    function chitiet($id){
        $movie = DB::table('movie')->where('id', $id)->first();

        if (!$movie) {
            abort(404);
        }

        return view('movie.chitiet', compact('movie'));
    } 
}
