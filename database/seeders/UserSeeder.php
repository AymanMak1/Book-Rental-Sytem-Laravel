<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name'=> "Ready Reader",
            'email'=> "reader@brs.com",
            'email_verified_at' => now(),
            'password'=> Hash::make('reader22@'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name'=> "Librato Librarian",
            'email'=> "librarian@brs.com",
            'email_verified_at' => now(),
            'password'=> Hash::make('librarian22@'),
            'remember_token' => Str::random(10),
            'is_librarian'=> true
        ]);

        User::factory()->count(15)->create();
    }
}
