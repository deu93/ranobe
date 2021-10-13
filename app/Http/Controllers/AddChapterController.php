<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Chapter;
use Illuminate\Http\Request;

class AddChapterController extends Controller
{
    public function index($id) {
        $genres_menu = Genre::all();
        $book = Book::find($id);
        
        if(auth()->user()->role > 0){
            return view('add-chapter', [
                'genres_menu' => $genres_menu,
                'book' => $book
            ]);   
        }
        else {
            return redirect()->route('home')->with('status', '404');
        }
    }

    public function store(Request $request, $id) {
        
        if(auth()->user()->role > 0){
            $this->validate($request,[
                'chapter_name' => 'required|max:255',
                'chapter_text' => 'required',
            ]);

            
            $chapter = new Chapter();
            
            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_text = $request->chapter_text;
            $chapter->book_id = $id;
            $chapter->save();
            $book = Book::where('id', $id)->first();
            
            return redirect('book-show/'. $book->slug)->with('status', 'Глава успешно добавлена');




        }
        else{
            return redirect()->back()->with('status', '404');
        }
    }
}
