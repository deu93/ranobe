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
            
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        

        

        if(Hash::check($request->password, $user->password)){
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->update();
        }
        else{
            return redirect()->back()->with('status' , 'Не верный пароль');
        }
        
        return redirect()->route('profile');
        
    }
}
