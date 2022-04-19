<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowsController;

Route::get('/', [PagesController::class, 'index'])->name('main');
Route::get('user/profile', [PagesController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::resource('/rentals',BorrowsController::class);
Route::resource('/books',BooksController::class);
Route::resource('/genres',GenresController::class);
Route::get('/home', [PagesController::class, 'index'])->middleware(['auth'])->name('home');
require __DIR__.'/auth.php';

