<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index() {
        if(auth()->user()->role == 1 || auth()->user()->role == 2){
            return view('add-book');   
        }
        
    }

    public function store(Request $request) {
        if(auth()->user()->role == 1 || auth()->user()->role == 2){
            $this->validate($request,[
                'title' => 'required|max:255',
                'description' => 'required',
            ]);


            $book = new Book();

            if($request->hasFile('image')){
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $file->extension();
                $file->move('img', $filename);
                $book->image = $filename;
                
            }
            
            $book->title = $request->title;
            $book->slug = Str::slug($request->title, '-');
            $book->description = $request->description;
            $book->user_id = $request->user()->id;
            $book->save();

            return redirect()->route('home')->with('status', 'Книга добавлена успешно');
        }
    }
}