<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;
use App\Models\User;

class MainController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        $genres = Genre::all();
        $users = User::all();
        //dd($books);
        return view('index', [
            'users'=>$users,
            'books' => $books,
            'genres' => $genres
        ]);
    }
}
