<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;

class AddMovieController extends Controller
{
    //
    public function index() {
        $genres = Genre::all();
        return view('admin.add-movie', [
            'upperNav' => 'nil',
            'sideNav' => 'add',
            'genres' => $genres,
        ]);
    }

    public function addMovie(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,webp|required',
            'video' => 'required|max:40000',
            'price' => 'required',
        ]);

        // move image into Images folder in public directory

        $newImageName = time(). '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        // move video to video folder in public directory

        $newVideoName = time(). '.' . $request->video->extension();
        $request->video->move(public_path('video'), $newVideoName);

        Movie::create([
            'name' => $request->name,
            'description' => $request->description,
            'genre' => $request->genre,
            'image' => $newImageName,
            'video' => $newVideoName,
            'price' => $request->price,
            'popular' => 'null',
            'status' => 'null',
        ]);

        return back()->with('message', 'Movie added successfully.');



    }
}
