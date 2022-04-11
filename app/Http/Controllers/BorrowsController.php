<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;

class BorrowsController extends Controller
{

    public function index()
    {
        return view('rentals.index');
    }


    public function create()
    {
        //return view('rentals.index');

    }


    public function store(Request $request)
    {
        $status = "PENDING";
        Borrow::create([
            'reader_id' => $request->input('reader_id'),
            'book_id' => $request->input('book_id'),
            'status' => $status
        ]);
        return redirect('/books')->with('message','The rental request has been submitted successfully!');
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
