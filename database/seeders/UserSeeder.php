<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name'=> "Ready Reader",
            'email'=> "reader@brs.com",
            'password'=> Hash::make('reader22@')
        ]);
        DB::table('users')->insert([
            'name'=> "Librato Librarian",
            'email'=> "librarian@brs.com",
            'password'=> Hash::make('librarian22@'),
            'is_librarian'=> true
        ]);
        /*
        DB::table('users')->truncate();

        User::create([
            'name'=> "Ready Reader",
            'email'=> "reader@brs.com",
            'password'=> Hash::make('reader22@')
        ]);
        User::create([
            'name'=> "Librato Librarian",
            'email'=> "librarian@brs.com",
            'password'=> Hash::make('librarian22@'),
            'is_librarian'=> true
        ]);*/
    }
}
