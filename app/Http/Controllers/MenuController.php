<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Produit;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $Allproduits = Produit::all();
        $Allcategories = Categories::all();
        return view('menu')->with('Allproduits', $Allproduits)->with('Allcategories', $Allcategories);
    }
}
