<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function list(){
        $genres = Genre::all();
        //dd($genres);
        return view('genres.list', [
            'genres' => $genres
        ]);

    }
}
