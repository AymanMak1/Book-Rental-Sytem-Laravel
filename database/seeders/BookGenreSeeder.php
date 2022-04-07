<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_genre')->truncate;
        BookGenre::factory()
            ->has(Book::factory()->count(3))
            ->has(Genre::factory()->count(3))
            ->create();
    }
}
