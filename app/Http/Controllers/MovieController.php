<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class MovieController extends Controller
{
    //
    public function index($id) {
        $movie = Movie::find($id);
        return view('movie-view', [
            'upperNav' => 'nil',
            'sideNav' => 'genre',
            'movie' => $movie,
        ]);
    }
}
