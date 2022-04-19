<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        $genres = Genre::all();
        $users = User::all();
        $rentals = Borrow::all();
        //dd($books);
        return view('index', [
            'users'=>$users,
            'books' => $books,
            'genres' => $genres,
            'rentals' => $rentals
        ]);
    }

    public function profile(){
        return view("users.profile",['userprofile'=> Auth::user()]);
    }
}
