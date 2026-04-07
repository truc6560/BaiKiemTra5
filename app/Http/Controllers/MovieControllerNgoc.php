<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
