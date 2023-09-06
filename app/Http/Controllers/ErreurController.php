<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErreurController extends Controller
{
    public function erreur404(){
        return view('error.404');
    }
}
