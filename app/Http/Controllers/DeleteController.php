<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

use Illuminate\Support\Facades\File;

class DeleteController extends Controller
{
    //
    public function deleteMovie($id) {
        $movie = Movie::find($id);
        if($movie) {
            $video = $movie->video;
            $image = $movie->image;
            $movie->delete();
            File::delete(public_path('video/'.$video));
            File::delete(public_path('images/'.$image));
            return back()->with('message', 'Movie Deleted Successfully');
        }

        else {
            return redirect()->route('home'); 
        }

    }
}
