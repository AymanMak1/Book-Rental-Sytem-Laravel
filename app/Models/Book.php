<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    #slug
    protected $fillable = ['title', 'author','description','released_at',
                            'cover_image','language_code','pages','isbn','in_stock'];

    public function borrows() {
        return $this->hasMany(Borrow::class, 'book_id');
    }

    public function activeBorrows() {
        return $this->getAllBorrows()->where('status', '=', 'ACCEPTED');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
