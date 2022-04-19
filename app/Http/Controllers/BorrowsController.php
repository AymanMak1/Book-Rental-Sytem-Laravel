<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateBorrowLibrarianRequest;
use App\Http\Requests\UpdateBorrowReaderRequest;

class BorrowsController extends Controller
{

    public function index()
    {
        if(Auth::user()->is_librarian == 0){
            $rentals = DB::table('borrows')
            ->join('books','borrows.book_id','=','books.id')
            ->join('users','borrows.reader_id','=','users.id')
            ->where('users.id','=',Auth::id())
            ->select('borrows.*', 'books.title','books.author')
            ->get();
        } else {
            $rentals = DB::table('borrows')
            ->join('books','borrows.book_id','=','books.id')
            ->join('users','borrows.reader_id','=','users.id')
            ->select('borrows.*', 'books.title','books.author')
            ->get();
        }
        return view('rentals.index', [
            'myrentals' => $rentals
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
                        ->where('borrows.id','=', $id)
                        ->select('borrows.*','books.title','books.author','books.released_at',"books.slug","users.name")
                        ->get();
        $rentalDetails[0]->request_managed_by_name= User::where('id', '=',$rentalDetails[0]->request_managed_by)->select('name')->get();
        $rentalDetails[0]->return_managed_by_name= User::where('id', '=',$rentalDetails[0]->return_managed_by)->select('name')->get();
        return view('rentals.show',['rental' => $rentalDetails]);
    }


    public function edit($id)
    {

    }

    public function update(UpdateBorrowLibrarianRequest $librarianRequest, UpdateBorrowReaderRequest $readerRequest,  $id){
        $now = now('Europe/Budapest');
        if(Auth::user()->is_librarian === 1){
            $validate_data = $librarianRequest->validated();
            $validate_data['request_processed_at'] = $now;
            $validate_data['request_managed_by'] = Auth::id();
            if($validate_data['status'] == 'RETURNED'){
                $validate_data['return_managed_by'] = Auth::id();
            }
            Borrow::where('id',$id)->update($validate_data);
        }
        if(Auth::user()->is_librarian === 0){
            $validate_data = $readerRequest->validated();
            Borrow::where('id',$id)->update($validate_data);
        }

        return redirect('/rentals')->with('message','The request has been submitted successfully');
    }

    public function destroy($id)
    {
        //
    }
}
