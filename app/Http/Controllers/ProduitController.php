<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{

    public function index()
    {
        $allCategories = Categories::all();
        $allProduit = Produit::all();
        return view('Admin.allproduits')->with('allCategories', $allCategories)->with('allProduit', $allProduit);
    }

    public function addProduit_view()
    {
        $allCategories = Categories::all();
        return view('Admin.addproduit')->with('allCategories', $allCategories);
    }

    public function addProduit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'categorie' => 'required',
            'prix' => 'required',
            'image' => 'image|max:1999|required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '.' . $extension;
            $path = $request->file('image')->storeAs('public/produit_images', $fileNameToStore);
        }
        $produit = new Produit();
        $produit->nom = $request->input('nom');
        $produit->prix = $request->input('prix');
        $produit->idCategories = $request->input('categorie');
        $produit->description =  $request->input('description');
        $produit->imageProduit =  $fileNameToStore;
        $produit->status =  '0';
        $produit->homePage =  '0';
        $produit->save();

        return redirect('/tous-les-produits')->with('success', 'Produit ajouté avec succès!');
    }

    public function edit_produit_view($id)
    {
        $produit = Produit::where('id', '=', $id)->first();
        $allCategories = Categories::all();
        return view('Admin.editproduit')->with('produit', $produit)->with('allCategories', $allCategories);
    }

    public function editProduit($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'categorie' => 'required',
            'prix' => 'required',
            'image' => 'image|max:1999|required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (!Storage::exists('public/produit_images/' . $request->file('image')->getClientOriginalName())) {
            if ($request->hasFile('image')) {
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '.' . $extension;
                $path = $request->file('image')->storeAs('public/produit_images', $fileNameToStore);
            }
        }

        $produit = Produit::find($id);
        $produit->nom = $request->input('nom');
        $produit->prix = $request->input('prix');
        $produit->idCategories = $request->input('categorie');
        $produit->description =  $request->input('description');
        $produit->imageProduit = $request->file('image')->getClientOriginalName();
        $produit->status =  '0';
        $produit->homePage =  '0';
        $produit->save();
        return redirect('/tous-les-produits')->with('success', 'Produit modifier avec succès!');
    }

    public function delete_produit($id)
    {
        $produit = Produit::find($id);
        $produit->delete();
        return back();
    }

    public function update_produit_homepage($id)
    {
        if (Produit::find($id)) {
            $produit = Produit::find($id);
            if ($produit['homepage'] == 1) {
                $produit->homepage = '0';
                $produit->save();
                return back();
            } else {
                $produit->homepage = '1';
                $produit->save();
                return back();
            }
        } else {
        }
    }

    public function update_produit_status($id)
    {
        if (Produit::find($id)) {
            $produit = Produit::find($id);
            if ($produit['status'] == 1) {
                $produit->status = '0';
                $produit->save();
                return back();
            } else {
                $produit->status = '1';
                $produit->save();
                return back();
            }
        } else {
        }
    }
}
