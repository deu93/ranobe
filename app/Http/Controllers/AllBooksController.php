<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllBooksController extends Controller
{
    public function index() {
        $genres_menu = Genre::all();
        $books = Book::all();
        return view('all-books',[
            'books' => $books,
            'genres_menu' => $genres_menu
        ]);
    }

    public function show($id) {
        $genres_menu = Genre::all();
        $books = DB::table('books')
        ->join('book_genres', 'books.id', '=' , 'book_genres.book_id')
        ->join('genres', 'book_genres.genres_id', '=' , 'genres.id')
        ->where('genres.id', $id)
        ->select('books.*',  'genres.genres_name', 'book_genres.genres_id', 'book_genres.genre_added')
        ->get();
        
        return view('books-genre',[
            'books' => $books,
            'genres_menu' => $genres_menu
        ]);
    }
}
