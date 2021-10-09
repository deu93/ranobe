<?php

namespace App\Http\Controllers\Auth;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        $genres_menu = Genre::all();
        return view('auth.login', [
            'genres_menu' => $genres_menu
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    


        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Ошибка логина или пароля');
        }

        return redirect()->route('home');
    }
}
