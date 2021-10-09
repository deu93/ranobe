<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class BookShowController extends Controller
{
    public function index($slug) {
        $book= Book::where('slug',$slug)->first();
        $genres_id = BookGenre::where('book_id', $book->id)->get();
        
        $genres_array = [];

        foreach($genres_id as $genre_id) {
            array_push($genres_array, $genre_id->genres_id);
        }
        $genres = [];
        
        foreach($genres_array as $genre_item) { 
            array_push($genres, Genre::where('id', $genre_item)->first());
        }
       

        
        return view('book-show',[
            'book' => $book,
            'genres' => $genres
        ]);
    }
}
