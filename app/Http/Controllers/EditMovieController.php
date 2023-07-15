<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;

use Illuminate\Support\Facades\File;

class EditMovieController extends Controller
{
    //
    public function index($id) {
        $movie = Movie::find($id);
        $genres = Genre::all();
        return view('admin.edit-movie', [
            'upperNav' => 'nil',
            'sideNav' => 'add',
            'movie' => $movie,
            'genres' => $genres,
        ]);
    }

    public function editMovie(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,webp',
            'video' => 'max:40000',
            'price' => 'required',
            'initialImage',
            'initialVideo',
        ]);

        // move image into Images folder in public directory

        if(empty($request->image)) {
            $newImageName = $request->initialImage;
        }

        else {
            File::delete(public_path('images/'.$request->initialImage));
            $newImageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }

        // move video to video folder in public directory

        if(empty($request->video)) {
            $newVideoName = $request->initialVideo;
        }

        else {
            File::delete(public_path('video/'.$request->initialVideo));
            $newVideoName = time(). '.' . $request->video->extension();
            $request->video->move(public_path('video'), $newVideoName);
        }

        $update = Movie::where('id', $id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'genre' => $request->genre,
            'image' => $newImageName,
            'video' => $newVideoName,
            'price' => $request->price,
        ]);

        return back()->with('message', 'Movie updated successfully.');

    }
}
