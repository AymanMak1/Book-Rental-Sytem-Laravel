<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function borrows() {
        return $this->hasMany(Borrow::class, 'book_id');
    }

    public function activeBorrows() {
        return $this->getAllBorrows()->where('status', '=', 'ACCEPTED');
    }
}
