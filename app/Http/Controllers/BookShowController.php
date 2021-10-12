<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Chapter;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class BookShowController extends Controller
{
    public function index($slug) {
        $book= Book::where('slug',$slug)->first();
        $chapter = Chapter::where('book_id' , $book->id )->first();
       
        
        
        $genres_menu = Genre::all();

        
        return view('book-show',[
            'book' => $book,
            'chapter' => $chapter,
            'genres_menu' => $genres_menu
        ]);
    }
}
