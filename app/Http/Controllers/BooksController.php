<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookFormRequest;
use Illuminate\Pagination\Paginator;

class BooksController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>[
            'index',
            'show'
        ]]);
    }
    public function index(){
       $search =request()->query('search');

       if($search){
            $books = Book::where('title','LIKE','%'.$search.'%')
            ->orWhere('author','LIKE','%'.$search.'%')
            ->paginate(8);
            return view('books.index',compact('books'));
       }

       $books = Book::paginate(8);
       return view('books.index', [
           'books' => $books
       ]);
    }

    public function create(){
        $genres = Genre::all();
        return view('books.create', [
            'genres' => $genres
        ]);
    }

    public function store(BookFormRequest $request){
        $validate_data = $request->validated();
        $validate_data['slug'] = SlugService::createSlug(Book::class,'slug',$request->title);
        $newImageName = NULL;
        if($request->cover_image != NULL){
            $newImageName = uniqid() . '-' . SlugService::createSlug(Book::class,'slug',$request->title) . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('imgs/books'), $newImageName);
        }
        $validate_data['cover_image'] = $newImageName;
        $book = Book::create($validate_data);
        $genresIds = $request->input('book_genres');
        $book->genres()->attach($genresIds);
        return redirect('/books')->with('message','The book has been added successfully !');
    }

    public function show($slug){
        return view('books.show')->with('book',Book::where('slug', $slug)->first());
    }

    public function edit($slug){
        return view('books.edit')->with('book',Book::where('slug',$slug)->first());
    }

    public function update(BookFormRequest $request, $slug){
        $validate_data = $request->validated();
        $validate_data['slug'] = SlugService::createSlug(Book::class,'slug',$request->title);
        Book::where('slug',$slug)->update();
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
