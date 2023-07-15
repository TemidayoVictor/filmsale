<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class HomeController extends Controller
{
    //
    public function index() {
        $popular = Movie::orderBy('id', 'DESC')->get();
        $movies = Movie::all();
        return view('home', [
            'upperNav' => 'nil',
            'sideNav' => 'home',
            'popular' => $popular,
            'movies' => $movies,
        ]);
    }
}
