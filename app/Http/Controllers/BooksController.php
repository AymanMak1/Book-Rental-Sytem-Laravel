<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookFormRequest;

class BooksController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>[
            'index',
            'show'
        ]]);
    }
    public function index()
    {
       $search =request()->query('search');

       if($search){
            $books = Book::where('title','LIKE','%'.$search.'%')
            ->orWhere('author','LIKE','%'.$search.'%')
            ->get();
            return view('books.index',compact('books'));
       }

       $books = Book::all()->sortByDesc("id");
       return view('books.index', [
           'books' => $books
       ]);
    }


    public function create()
    {
        $genres = Genre::all();
        return view('books.create', [
            'genres' => $genres
        ]);
    }


    public function store(BookFormRequest $request)
    {
        $request->validated();

        $newImageName = NULL;
        if($request->cover_image != NULL){
            $newImageName = uniqid() . '-' . SlugService::createSlug(Book::class,'slug',$request->title) . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('imgs/books'), $newImageName);
        }

        $book = Book::create([
            'title' => $request->input('title'),
            'slug' => SlugService::createSlug(Book::class,'slug',$request->title),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'released_at'=>$request->input('released_at'),
            'cover_image' => $newImageName,
            'language_code' => $request->input('language_code'),
            'pages' => $request->input('pages'),
            'isbn'=> $request->input('isbn'),
            'in_stock'=> $request->input('in_stock')
        ]);

        $genresIds = $request->input('book_genres');
        $book->genres()->attach($genresIds);

        return redirect('/books')->with('message','The book has been added successfully !');
    }


    public function show($slug)
    {
        //$book = Book::find($id);
        //var_dump($book->genres);
        return view('books.show')->with('book',Book::where('slug', $slug)->first());
    }


    public function edit($slug)
    {
        return view('books.edit')->with('book',Book::where('slug',$slug)->first());
    }


    public function update(BookFormRequest $request, $slug)
    {
        $request->validated();

        Book::where('slug',$slug)->update([
            'title' => $request->input('title'),
            'slug' => SlugService::createSlug(Book::class,'slug',$request->title),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'released_at'=>$request->input('released_at'),
            'language_code' => $request->input('language_code'),
            'pages' => $request->input('pages'),
            'isbn'=> $request->input('isbn'),
            'in_stock'=> $request->input('in_stock')
        ]);
        return redirect('/books')->with('message','the book has been updated successfully!');
    }


    public function destroy($slug)
    {
        $book = Book::where('slug',$slug);
        $book->delete();

        return redirect('/books')->with('message','The book has been deleted!');
    }

    public function rentals()
    {
        return view('books.rentals');

    }

}
