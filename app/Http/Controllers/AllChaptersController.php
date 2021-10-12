<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Chapter;
use Illuminate\Http\Request;

class AllChaptersController extends Controller
{
    public function index($id){
        $genres_menu = Genre::all();
        $chapters = Chapter::where('book_id', $id)->get();
        return view('all-chapters', [
            'chapters' => $chapters,
            'genres_menu' => $genres_menu
        ]);
    }
}
