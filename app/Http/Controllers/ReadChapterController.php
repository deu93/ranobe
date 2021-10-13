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

    public function next($id) {
        
        $chapter = Chapter::where('id', $id)->first();
        $chapters = Chapter::where('book_id', $chapter->book_id)->get();
        
        foreach($chapters as $item){
            
            if($item->id > $id){
                $id = $item->id;
                return redirect('read-chapter/'.$id);
            }else{
                continue;
            }

        }
    }
    public function prev($id) {
        
        $chapter = Chapter::where('id', $id)->first();
        $chapters = Chapter::where('book_id', $chapter->book_id)->get();
        $chapters_array = [];
        foreach($chapters as $item){
            array_push($chapters_array, $item);
        }
        $chapt_reverse = array_reverse($chapters_array);
        foreach($chapt_reverse as $item){
            if($item->id < $id){
                $id = $item->id;
                return redirect('read-chapter/'.$id);
            }else{
                continue;
            }

        }
    }
}
