<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list(){
        /*$users= User::all();
        dd($users);
        return view('index',["users"=> $users]);*/
    }

}
