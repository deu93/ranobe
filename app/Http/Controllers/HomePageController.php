<?php

namespace App\Http\Controllers;

use App\Models\Ranobe;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {
        $ranobes = Ranobe::all();
        
        return view('index', ['ranobes' => $ranobes]);
    }
}
