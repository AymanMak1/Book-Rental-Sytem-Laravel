<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Book;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->truncate();
        Book::factory()->count(12)->create();
        foreach(Book::all() as $book){
            $genres = DB::table('genres')->take(rand(1,8))->pluck('id');
            $book->genres()->attach($genres);
        }
    }
}
