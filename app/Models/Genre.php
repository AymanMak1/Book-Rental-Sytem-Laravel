<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = ['name','style'];

    protected $styles = ['bg-sky-500', 'bg-neutral-500', 'bg-green-500', 'bg-red-600',
                              'bg-amber-400', 'bg-cyan-600', 'bg-slate-200', 'bg-neutral-900'];

    public function books() {
        return $this->hasMany(Book::class, 'book_genre');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
