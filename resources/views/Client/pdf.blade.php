<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Commande #{{ $order->id }}</title>
    <link rel="stylesheet" href="http://lecomptoiraburger/css/client/pdf.css" media="all" />
</head>

<body>
    <div class="container" style="margin: auto">
    <header class="clearfix" >
        <h1>Commande #{{ $order->id }}</h1>
        <div id="company" class="clearfix">
            <div>Le Comptoir à Burger</div>
            <div>XXXX Fake Adresse,<br /> 72000, Paris</div>
            <div>XX XX XX XX XX</div>
            <div><a href="mailto:company@example.com">Lecomptoiraburger@fake.com</a></div>
        </div>
        <div id="project">
            <div><span>CLIENT</span> {{ $order->nom }}</div>
            <div><span>ADDRESS</span> {{ $order->adresse }}</div>
            <div><span>EMAIL</span> <a href="mailto:john@example.com">{{ Auth::user()->email }}</a></div>
            <div><span>DATE</span> {{ $order->created_at }}</div>
            <div><span>STATUS</span> {{ ucfirst($order->status) }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">Produit</th>
                    <th></th>
                    <th>Prix</th>
                    <th>QTY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($panier->items as $item)
                    <tr>
                        <td class="service">{{ $item['produit_nom'] }}</td>
                        <td><img src="{{ asset('/storage/produit_images/' . $item['produit_image']) }}" alt=""
                                srcset="" style="width: 64px;height:64px"></td>
                        <td class="unit">{{$item['produit_prix'].' €'}}</td>
                        <td class="qty">{{$item['qty']}}</td>
                        <td class="total"> {{number_format($item['qty']*$item['produit_prix'],2,',','.')}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">TOTAL</td>
                    <td class="total">{{$panier->totalPrice .' €'}}</td>
                </tr>
            </tbody>
        </table>
    </main>
</div>
</body>

</html>
