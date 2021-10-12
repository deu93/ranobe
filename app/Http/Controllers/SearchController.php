<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $this->validate($request,[
            'search' => 'required|min:3|max:255'
        ]);
        $books = Book::all();
        $genres_menu = Genre::all();
        $neddle = $request->search;
        $books_array = [];
        foreach ($books as $book) {
            $title = Str::lower($book->title);
            $result = Str::of(Str::lower($title))->match('/'.$neddle.'/');
            if(!$result->isEmpty()){
                array_push($books_array, $book->id);
            }
        }
 
        return view('search', [
            'genres_menu' => $genres_menu,
            'books' => $books,
            'books_array' => $books_array
        ]);

    }
}
