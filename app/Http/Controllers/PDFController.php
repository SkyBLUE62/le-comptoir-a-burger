<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function show($id)
    {
        try {
            $order = Orders::find($id);
            if ($order->count() > 0) {
                if (Auth::user()->id == $order->idUser) {
                    $panier = unserialize($order->panier);
                    return view('Client.pdf')->with('order', $order)->with('panier', $panier);
                }
                elseif (Auth::user()->isAdmin() == true) {
                    $panier = unserialize($order->panier);
                    return view('Client.pdf')->with('order', $order)->with('panier', $panier);
                }
            }
        } catch (\Throwable $th) {
            return redirect('/404');
        }

    }
}
