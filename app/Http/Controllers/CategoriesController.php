<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Produit;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $allCategories = Categories::all();
        $allProduit = Produit::all();
        return view('Admin.allcategories')->with('allCategories', $allCategories)->with('allProduit',$allProduit);
    }

    public function addcategorie_view()
    {
        return view('Admin.addcategorie');
    }

    public function addcategorie(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:categories|string|max:255'
        ]);

        $model = new Categories();
        $model->nom = $request->input('nom');
        $model->save();
        return redirect('/toutes-les-categories');
    }

    public function edit_categorie_view($id)
    {
        $categorie = Categories::where('id', '=', $id)->first();
        return view('Admin.editcategorie')->with('categorie', $categorie);
    }

    public function edit_categorie($id, Request $request)
    {
        $categorie = Categories::find($id);
        $notification = 'La catégorie ' . $categorie['nom'] . ' a été mise à jour en ' . $request->input('nom') . '.';
        $categorie->nom = $request->input('nom');
        $categorie->save();
        return redirect('/toutes-les-categories')->with('notification', $notification);
    }

    public function delete_categorie($id)
    {
        $categorie = Categories::find($id);
        $notification = 'La catégorie ' . $categorie['nom'] . ' a été supprimé avec succès.';
        $categorie->delete();
        return redirect('/toutes-les-categories')->with('notification', $notification);
    }
}
