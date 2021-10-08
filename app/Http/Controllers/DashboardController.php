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
        $role = auth()->user()->role;
        if($role == 0) {
            return redirect()->back()->with('status', 'Страница не найдена');
        }
        else{
          return view('dashboard', [
            'books' => $books
        ]);  
        }
        
    }
}
