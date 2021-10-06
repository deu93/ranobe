<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user) {
        $id = Auth::user()->id;
        $data = User::where('id', $id)->get();
        
        return view('auth.profile', [
            'data' => $data
        ]);
    }

    public function edit() {
        return view('auth.editprofile');
    }

    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile');
        
    }
}
