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
                        ->where('borrows.reader_id','=',Auth::id())
                        ->get();

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
        return redirect('/books'.'/'.$request->input('book_slug'));
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
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
