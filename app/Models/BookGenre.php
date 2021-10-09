<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookGenre extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'genre_added',
        'book_id',
        'genres_id',
    ];

    public function genres() {
        return $this->hasOne(Genre::class);
    }
}
