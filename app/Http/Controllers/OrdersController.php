<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Produit;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::all();
        $produits = Produit::all();
        $panier = [];

        foreach ($orders as $order) {
            $panier[] = unserialize($order->panier);
        }

        return view('Admin.orders', compact('orders', 'panier', 'produits'));
    }

    public function update_status_order($id,Request $request){
        $order = Orders::find($id);
        $order->status = $request->input('status');
        $order->save();
        return back();
    }
}
