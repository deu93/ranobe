<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\BookGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index() {
        $genres = Genre::all();
        
        if(auth()->user()->role == 1 || auth()->user()->role == 2){
            return view('add-book',[
                'genres' => $genres
            ]);   
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
            
            
            $genres = Genre::all();
            
            
            foreach($genres as $genre){
                $bookGenre = new BookGenre();
                $bookGenre->book_id = $book->id;
                $bookGenre->genres_id = $genre->id;
                $id = $genre->id;
                $bookGenre->genre_added = $request->input($id) == TRUE ? '1':'0';
                $bookGenre->save();
            }
            


            return redirect()->route('dashboard')->with('status', 'Книга добавлена успешно');
        }
    }

    public function edit($slug) {
        $book= Book::where('slug',$slug)->first();
        
        $genres_id = BookGenre::where('book_id', $book->id)->get();
        
        $genres_array = [];

        foreach($genres_id as $genre_id) {
            array_push($genres_array, $genre_id->genres_id);
        }
        $genres = [];
        
        foreach($genres_array as $genre_item) { 
            array_push($genres, Genre::where('id', $genre_item)->first());
        }
       

        
        return view('edit-book',[
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function update(Request $request, $slug) {
        if(auth()->user()->role == 1 || auth()->user()->role == 2){
            $this->validate($request,[
                'title' => 'required|max:255',
                'description' => 'required',
            ]);

            $book = Book::where('slug', $slug)->first();
            

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
            
            
            $genres = Genre::all();
            
            
            foreach($genres as $genre){
                $bookGenre = new BookGenre();
                $bookGenre->book_id = $book->id;
                $bookGenre->genres_id = $genre->id;
                $id = $genre->id;
                $bookGenre->genre_added = $request->input($id) == TRUE ? '1':'0';
                $bookGenre->update();
            }
            


            return redirect()->route('dashboard')->with('status', 'Книга обновлена успешно');
        }
    }

    public function destroy($slug) {
        $book = Book::where('slug', $slug)->first();
        
        if(auth()->user()->role > 0) {
            if($book->user_id == auth()->user()->id){

                if($book->image) {
                    $path = 'ranobe/public/img' . $book->image;
                    if(File::exists($path)) {
                        File::delete($path);
                    }
                }
    
                $book->delete();
                return redirect()->route('dashboard')->with('status', 'Книга успешно удалена');
            }
        }
        
    }

}
