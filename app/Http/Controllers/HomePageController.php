<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Ranobe;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {
        $ranobes = Book::latest()->paginate(5);
        
        return view('index', [
            'ranobes' => $ranobes,
        ]);
    }
}
