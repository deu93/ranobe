<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Ranobe;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {
        $ranobes = Book::latest()->paginate(5);
        $genres_menu = Genre::all();
        
        return view('index', [
            'ranobes' => $ranobes,
            'genres_menu' => $genres_menu
        ]);
    }
}
