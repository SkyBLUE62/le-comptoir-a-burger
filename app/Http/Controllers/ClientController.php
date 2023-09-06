<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Avis;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    public function index()
    {
        if (Orders::where('idUser', '=', Auth::user()->id)->count() > 0 && Adresse::where('idUser', '=', Auth::user()->id)->count() > 0) {
            $orders = Orders::where('idUser', '=', Auth::user()->id)->get();
            $adresses =  Adresse::where('idUser', '=', Auth::user()->id)->get();
            return view('Client.compte')->with('orders', $orders)->with('adresses', $adresses);
        } elseif (Orders::where('idUser', '=', Auth::user()->id)->count() > 0) {
            $orders = Orders::where('idUser', '=', Auth::user()->id)->get();
            return view('Client.compte')->with('orders', $orders);
        } elseif (Adresse::where('idUser', '=', Auth::user()->id)->count() > 0) {
            $adresses =  Adresse::where('idUser', '=', Auth::user()->id)->get();
            return view('Client.compte')->with('adresses', $adresses);
        } else {
            return view('Client.compte');
        }
    }

    public function address_view()
    {

        if (Orders::where('idUser', '=', Auth::user()->id)->count() > 0) {
            $orders = Orders::where('idUser', '=', Auth::user()->id)->get();
            return view('Client.adresse')->with('orders', $orders);
        }
        return view('Client.adresse');
    }

    public function orders_view()
    {
        if (Orders::where('idUser', '=', Auth::user()->id)->count() > 0) {
            $orders = Orders::where('idUser', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            return view('Client.orders')->with('orders', $orders);
        } else {
            return view('Client.orders');
        }
    }

    public function insertlonglat()
    {
        $dataAdresse = Adresse::where('idUser', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
        return view('Client.insertlonglat')->with('dataAdresse', $dataAdresse);
    }

    public function add_address(Request $request)
    {
        if (Auth::check()) {
            $adresse = new Adresse();
            $adresse->adresse = $request->input('adresse');
            $adresse->ville = $request->input('ville');
            $adresse->codePostal = $request->input('codePostal');
            $adresse->pays = $request->input('pays');
            $adresse->idUser = Auth::user()->id;
            $adresse->save();
            return redirect('/insert-long-lat');
        }
        return redirect('/mon-compte');
    }

    public function add_long_lat($id, Request $request)
    {
        $adresse = Adresse::find($id);
        $adresse->longitude = $request->input('longitude');
        $adresse->latitude = $request->input('latitude');
        $adresse->update();
        return redirect('mon-compte');
    }

    public function delete_adresse($id)
    {
        $adresse = Adresse::find($id);
        $adresse->delete();
        return back();
    }

    public function avis_view()
    {

        if (Orders::where('idUser', '=', Auth::user()->id)->count() > 0 && Adresse::where('idUser', '=', Auth::user()->id)->count() > 0) {
            $orders = Orders::where('idUser', '=', Auth::user()->id)->get();
            $adresses =  Adresse::where('idUser', '=', Auth::user()->id)->get();
            return view('Client.avis')->with('orders', $orders)->with('adresses', $adresses);
        } elseif (Orders::where('idUser', '=', Auth::user()->id)->count() > 1) {
            $orders = Orders::where('idUser', '=', Auth::user()->id)->get();
            return view('Client.avis')->with('orders', $orders);
        } else {
            return view('Client.avis');
        }
    }

    public function insert_avis(Request $request)
    {
        validator([
            'nom' => 'required|string',
            'avis' => 'required|string',
        ]);

        $avis = new Avis();
        $avis->nom = $request->input('nom');
        $avis->contenue = $request->input('avis');
        $avis->idUser = Auth::user()->id;
        $avis->save();
        return redirect('/mon-compte')->with('notification', 'Merci beeaucou ppour votre avis il est très important pour nous d\'avoir un retour de nos clients !');
    }
}
