<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function update(Request $request, User $user) {
        
    }
}
