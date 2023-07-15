<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;
use App\Models\Movie;

class GenreController extends Controller
{
    //
    public function index() {
        $genres = Genre::all();
        $movies = Movie::all();
        return view('genre', [
            'upperNav' => 'nil',
            'sideNav' => 'genre',
            'genres' => $genres,
            'movies' => $movies,

        ]);
    }

    public function genreView($id) {
        $movies = Movie::where('genre', $id)->get();
        return view('genre-view', [
            'upperNav' => 'nil',
            'sideNav' => 'genre',
            'movies' => $movies,
            'genre' => $id,

        ]);
    }
}
