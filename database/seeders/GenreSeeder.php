<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Genre;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    public function run()
    {
        DB::table('genres')->truncate();
        Genre::factory()->count(8)->create();
        /*foreach(Genre::all() as $genre){
            $books = DB::table('books')->take(rand(1,10))->pluck('id');
            $genre->books()->attach($books);
        }*/
    }
}
