<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index() {
        $books = Book::latest()->where('user_id', auth()->user()->id)->paginate(5);
        $genres_menu = Genre::all();
        $role = auth()->user()->role;
        if($role == 0) {
            return redirect()->back()->with('status', 'Страница не найдена');
        }
        else{
          return view('dashboard', [
            'books' => $books,
            'genres_menu' => $genres_menu
        ]);  
        }
        
    }
}
