<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Models\Adresse;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    public function index()
    {

        if (Auth::check() && Adresse::where('idUser', '=', Auth::user()->id)->get()->count() > 0) {
            $adresses = Adresse::where('idUser', '=', Auth::user()->id)->get();
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            return view('panier', ['produits' => $cart->items])->with('adresses', $adresses);
        } else {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            return view('panier', ['produits' => $cart->items]);
        }
    }

    public function add_to_panier($idProduit)
    {
        try {
            $produit = Produit::find($idProduit);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($produit, $idProduit);
            Session::put('cart', $cart);
            return back();
        } catch (\Throwable $th) {
            return redirect('/404');
        }
    }

    public function delete_item_to_panier($id)
    {
        try {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);

            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }

            return back();
        } catch (\Throwable $th) {
            return redirect('/404');
        }
    }

    public function modifier_qty($id, Request $request)
    {
        try {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->updateQty($id, $request->quantity);
            Session::put('cart', $cart);
            return back();
        } catch (\Throwable $th) {
            return redirect('/404');
        }
    }
}
