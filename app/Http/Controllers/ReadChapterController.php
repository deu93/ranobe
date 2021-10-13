<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ReadChapterController extends Controller
{
    public function index($id) {
        $genres_menu = Genre::all();
        $chapter = Chapter::where('id', $id)->first();
        $book = Book::where('id', $chapter->book_id)->first();
        return view('read-chapter', [
            'genres_menu' => $genres_menu,
            'chapter' => $chapter,
            'book' => $book
        ]);
    }
}
