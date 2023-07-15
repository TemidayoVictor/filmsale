<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;

class AdminMovieListController extends Controller
{
    //
    public function index() {
        $movies = Movie::all();
        $genres = Genre::all();
        return view('admin.all-movies', [
            'upperNav' => 'nil',
            'sideNav' => 'allMovies',
            'movies' => $movies,
            'genres' => $genres,
            'genre' => 'All'
        ]);
    }

    public function filter(Request $request) {
        $this->validate($request, [
            'genre' => 'required',
        ]);
        $genre = $request->genre;
        $movies = Movie::where('genre', $genre)->get();
        $genres = Genre::all();
        return view('admin.all-movies', [
            'upperNav' => 'nil',
            'sideNav' => 'allMovies',
            'movies' => $movies,
            'genres' => $genres,
            'genre' => $genre,
        ]);
    }

}
