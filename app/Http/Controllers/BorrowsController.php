<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BorrowsController extends Controller
{

    public function index()
    {
        $myrentals = DB::table('borrows')
                        ->join('books','borrows.book_id','=','books.id')
                        ->join('users','borrows.reader_id','=','users.id')
                        ->where('users.id','=',Auth::id())
                        ->select('borrows.*', 'books.title','books.author')
                        ->get();
        // select borrows.*, books.* from books, borrows where borrows.reader_id = 18 and borrows.book_id = books.id;
        //$user = Auth::user();
        //$myrentals = $user->readerBorrows;
        //dd($myrentals);
        return view('rentals.index', [
            'myrentals' => $myrentals
        ]);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $status = "PENDING";
        Borrow::create([
            'reader_id' => $request->input('reader_id'),
            'book_id' => $request->input('book_id'),
            'status' => $status
        ]);
        return redirect('/books'.'/'.$request->input('book_slug'))->with('message','Your rental request has been submitted');;
    }

    public function show($id)
    {
        $rentalDetails = DB::table('borrows')
                        ->join('books','borrows.book_id','=','books.id')
                        ->join('users','borrows.reader_id','=','users.id')
                        ->where('users.id','=',Auth::id())
                        ->where('borrows.id','=', $id)
                        ->select('borrows.*','books.title','books.author','books.released_at',"books.slug")
                        ->get();
        //dd($rentalDetails);
        return view('rentals.show',['rental' => $rentalDetails]);
    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
