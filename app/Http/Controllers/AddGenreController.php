<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;

class AddGenreController extends Controller
{
    //
    public function index() {
        return view('admin.add-genre', [
            'upperNav' => 'nil',
            'sideNav' => 'add',
        ]);
    }

    public function addGenre(Request $request) {
        $this->validate($request, [
            'genre' => 'required',
        ]);

        Genre::create([
            'genre' => $request->genre,
        ]);

        return back()->with('message', 'Genre added successfully.');
    }

    public function changeAdd(Request $request) {
        $this->validate($request, [
            'genre' => 'required' 
        ]);

        if($request->genre == 1) {
            return redirect() -> route('addMovie');
        } 

        elseif($request->genre == 2) {
            return redirect() -> route('addGenre');
        }

        elseif($request->genre == 3) {
            return redirect() -> route('addAdmin');
        }
    }
}
