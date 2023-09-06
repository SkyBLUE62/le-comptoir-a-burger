<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Orders;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        $adresse = $request->input('adresse');
        FacadesSession::put('adresse', $adresse);

        Stripe::setApiKey('sk_test_51MhKNtHX51vKZQFstQKdRJzQuIXJ9ohf0waRrBGRUSM6EfqZUTwijiGF3YLWErO18StSgeiSu14C5OjZCce0nW9W00c1h015gn');
        $YOUR_DOMAIN = 'http://lecomptoiraburger';

        $cart = FacadesSession::get('cart');
        $produit_stripe = [];
        foreach ($cart->items as $item) {
            // Convertir le prix en centimes
            $prix_en_centimes = (int)($item['produit_prix'] * 100);
            $produit_stripe[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $prix_en_centimes,
                    'product_data' => [
                        'name' => $item['produit_nom'],
                        'images' => [$YOUR_DOMAIN . "/storage/produit_images/" . $item['produit_image']],
                    ],
                ],
                'quantity' => $item['qty'],
            ];
        }
        $checkout_session = Session::create([
            'line_items' => $produit_stripe,
            'payment_method_types' => [
                'card',
            ],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/checkout/success',
            'cancel_url' => $YOUR_DOMAIN . '/commande/erreur',
        ]);
        return redirect($checkout_session->url);
    }

    public function checkout_success()
    {
        try {
            $cart = FacadesSession::get('cart');
            $adresse = FacadesSession::get('adresse');
            $user = Auth::user();
            $dataAdresse = Adresse::where('id', '=', $adresse)->first();
            $order = new Orders();
            $order->nom = $user->name;
            $order->adresse = $dataAdresse['adresse'] . ' , ' . $dataAdresse['ville'] . ' , ' . $dataAdresse['pays'];
            $order->status = 'payer';
            $order->panier = serialize($cart);
            $order->idUser = $user->id;
            $order->prixTotal = $cart->totalPrice;
            $order->save();

            FacadesSession::forget('adresse');
            FacadesSession::forget('cart');

            return redirect('/mes-commandes')->with('notification', 'Votre payement a été valider avec success');
        } catch (\Throwable $th) {
            return redirect('/home');
        }
    }

    public function checkout_error()
    {
        if (FacadesSession::has('adresse')) {
            FacadesSession::forget('adresse');
            return view('error.checkout_error');
        } else {
            return redirect('/home');
        }
    }
}
