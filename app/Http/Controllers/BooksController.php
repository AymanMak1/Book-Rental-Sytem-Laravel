<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Cviebrock\EloquentSluggable\Services\SlugService;

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
            $books = Book::where('title','LIKE','%'.$search.'%')->get();
            return view('books.index',compact('books'));
       }
       $books = Book::all();
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


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'released_at'=>'required|before:now',
            'description'=>'nullable',
            'cover_image' => 'mimes:jpg,png,jpeg|max:5048',
            'language_code'=>'nullable',
            'pages'=>'required|min:0    ',
            'isbn'=>'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            'in_stock'=>'required|min:0'
        ]);
        $newImageName = NULL;
        if($request->cover_image != NULL){
            $newImageName = uniqid() . '-' . SlugService::createSlug(Book::class,'slug',$request->title) . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('imgs/books'), $newImageName);
        }



        Book::create([
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


    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'released_at'=>'required|before:now',
            'description'=>'nullable',
            'language_code'=>'nullable',
            'pages'=>'required|min:0    ',
            'isbn'=>'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            'in_stock'=>'required|min:0'
        ]);

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

    public function search(){
        /*$search_text = $_GET['query'];
        $books = Book::where('title','LIKE','%'.$search_text.'%')->get();

        return view('books.index',compact('books'));*/

    }

}
