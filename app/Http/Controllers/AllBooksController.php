<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

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
}
