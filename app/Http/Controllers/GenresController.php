<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Cviebrock\EloquentSluggable\Services\SlugService;

class GenresController extends Controller
{

    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', [
            'genres' => $genres
        ]);
    }


    public function create()
    {
        return view('genres.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:255',
            'style'=>'required|max:255',
        ]);



        Genre::create([
            'name' => $request->input('name'),
            'slug' => SlugService::createSlug(Genre::class,'slug',$request->name),
            'style' => $request->input('style'),
        ]);


        return redirect('/genres')->with('message','The genre has been added successfully !');
    }


    public function show($slug)
    {
        return view('genres.show')->with('genre',Genre::where('slug',$slug)->first());
    }

    public function edit($slug)
    {
        return view('genres.edit')->with('genre',Genre::where('slug',$slug)->first());
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name'=>'required|min:3|max:255',
            'style'=>'required|max:255',
        ]);



        Genre::where('slug',$slug)->update([
            'name' => $request->input('name'),
            'slug' => SlugService::createSlug(Genre::class,'slug',$request->name),
            'style' => $request->input('style'),
        ]);


        return redirect('/genres')->with('message','The genre has been updated successfully !');
    }

    public function destroy($slug)
    {
        $genre = Genre::where('slug',$slug);
        $genre->delete();

        return redirect('/genres')->with('message','The genre has been deleted!');
    }
}
