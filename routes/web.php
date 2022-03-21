<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/genres',[GenreController::class, 'list'])->name('genres.list');
Route::get('/books',[BookController::class, 'list'])->name('books.list');
//Route::get('/books/{book}','BookController@show')->name('books.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

