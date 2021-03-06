<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'slug',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function genre() {
        return $this->hasMany(Genre::class);
    }

    public function chapter() {
        return $this->hasMany(Chapter::class);
    }
}
