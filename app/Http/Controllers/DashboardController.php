<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index() {
        $books = Book::where('user_id', auth()->user()->id)->get();
        
        return view('dashboard', [
            'books' => $books
        ]);
    }
}
