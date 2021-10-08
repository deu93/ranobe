<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookShowController extends Controller
{
    public function index($slug) {
        $book= Book::where('slug',$slug)->first();
        return view('book-show',[
            'book' => $book
        ]);
    }
}
