<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        $genres_menu = Genre::all();
        return view('auth.register', [
            'genres_menu' => $genres_menu
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
            
        ]);
        
        
        if(User::where('username', $request->username)->first() ){
            return redirect()->back()->with('status', 'This username has been taken'); 
        }
        elseif(User::where('email', $request->email)->first()){
            return redirect()->back()->with('status', 'This email has been taken');
        }
        else {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            auth()->attempt($request->only('email', 'password'));

            return redirect()->route('home');
        }
        
        

        
    }
}
