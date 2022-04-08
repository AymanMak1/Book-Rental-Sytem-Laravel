<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\BooksController;

Route::get('/', [PagesController::class, 'index'])->name('main');
Route::resource('/books',BooksController::class);
Route::resource('/genres',GenresController::class);
//Route::get('/search', [PagesController::class, 'search']);
Route::get('/home', [PagesController::class, 'index'])->middleware(['auth'])->name('home');
require __DIR__.'/auth.php';

