<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class AddGenreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {
        $genres_menu = Genre::all();
        if(auth()->user()->role > 1){
            return view('add-genre', [
                'genres_menu' => $genres_menu
            ]);
        }
        else{
            return redirect()->back()->with('status','404');
        }
        
    }

    public function store(Request $request) {
        $this->validate($request, [
            'genres_name' => 'required|max:255'
        ]);

        $genre = new Genre();
        
        $genre->genres_name = $request->genres_name;
        $genre->save();

        return redirect()->route('dashboard');
    }
}
