<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function list(){
        $books = Book::all();
        //dd($books);
        return view('books.list', [
            'books' => $books
        ]);
    }
    public function show(){
        return view('books.show');
    }
}
