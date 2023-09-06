<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Categories;
use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Allproduits = Produit::all();
        $Allcategories = Categories::all();
        $Allavis = Avis::all();
        return view('home')->with('Allproduits', $Allproduits)->with('Allcategories', $Allcategories)->with('Allavis', $Allavis);
    }

    public function a_propos_de_nous(){
        return view('a_propos_de_nous');
    }
}
