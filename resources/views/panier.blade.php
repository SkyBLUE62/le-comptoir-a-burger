@extends('template.template')

@section('title')
    Mon Panier
@endsection
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="{{ asset('/css/panier/style.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="heading_container heading_center mb-3">
            <h2 style="color: black">
                Mon Panier
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                @if (isset($produits))
                                    <th>#</th>
                                    <th style="height: auto"></th>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantitées</th>
                                    <th>Total</th>
                                    <th></th>
                                @else
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($produits))
                                @foreach ($produits as $produit)
                                    @php
                                        $i = 1;
                                    @endphp
                                    <tr class="alert" role="alert">
                                        <td>
                                            {{ $i }}
                                        </td>
                                        <td style="height: auto">
                                            <img class="img-box"
                                                src="{{ asset('/storage/produit_images/' . $produit['produit_image']) }}"
                                                alt=""
                                                style="  max-width: 15%;
                                            height: auto;">
                                        </td>
                                        <td>
                                            <div class="email">
                                                <span style="color: black">{{ $produit['produit_nom'] }} </span>
                                            </div>
                                        </td>
                                        <td>{{ $produit['produit_prix'] . ' €' }}</td>
                                        <td class="quantity">
                                            <form method="post"
                                                action="{{ url('/update-qty-item/' . $produit['produit_id']) }}">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="number" name="quantity"
                                                        class="quantity form-control input-number"
                                                        value="{{ $produit['qty'] }}" min="1" max="100"
                                                        onchange="this.form.submit();">
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ number_format($produit['produit_prix'] * $produit['qty'], 2, ',', '.') . ' €' }}
                                        </td>
                                        <td>
                                            <a href="{{ url('supprimer-du-panier/' . $produit['produit_id']) }}"
                                                type="button">
                                                <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @else
                                <td></td>
                                <td class="text-center">Panier Vide</td>
                                <td></td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @if (!Session::has('cart'))
            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                <a href="{{ url('/nos-menus') }}" class="btn mx-auto" style="color: white;background-color: #ffbe33;">Nos
                    Menus</a>
            </div>
        @endif
    </div>

    @if (Auth::check() && isset($adresses) && Session::has('cart'))
        <section class="food_section layout_padding-bottom mt-4">
            <div class="container">
                <div class="heading_container heading_center mt-2 mb-2">
                    <h2>
                        Vos Adresses
                    </h2>
                </div>
                <div class="row grid">
                    @php
                        $i = 1;
                    @endphp
                    <form method="POST" action="{{ url('/checkout') }}"> @csrf
                        @foreach ($adresses as $adresse)
                            <div class="col-sm-6 col-lg-3 all">
                                <div class="box">
                                        <div id="map{{ $adresse['id'] }}" style="height: 200px"></div>
                                    <div>
                                        <div class="detail-box" style="height: 7rem">
                                            <div class="row">
                                                <h5>
                                                    {{ $adresse['adresse'] }}
                                                </h5>
                                            </div>
                                            <div class="row">

                                                <p>
                                                    {{ $adresse['ville'] }} <br>
                                                    {{ $adresse['codePostal'] . ' ' . $adresse['pays'] }}
                                                </p>
                                            </div>

                                            <div class="options d-flex"
                                                style=" display: flex;align-items: flex-end;justify-content: flex-end;position: absolute;bottom: 5%;width: 85%;">
                                                @if ($i == 1)
                                                    <input type="radio" name="adresse" checked
                                                        value="{{ $adresse['id'] }}">
                                                @else
                                                    <input type="radio" name="adresse" value="{{ $adresse['id'] }}">
                                                @endif
                                                @php
                                                    $i++;
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                    <button type="submit" class="btn btn-success mx-auto" style="">
                        Payer {{ number_format(Session::get('cart')->totalPrice, 2, ',', '.') }} €</button>
                </div>
            </form>

            <input type="hidden" id="idUser" value="{{Auth::user()->id}}">
    @endif
    </div>
    @if (!isset($adresses) && Session::has('cart'))
        <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
            <a href="{{ url('/ajouter-adresse') }}" class="btn btn-danger mx-auto" style="">
                Ajouter une Adresse
            </a>
        </div>
    @endif
    </section>


    @if (!Session::has('cart'))
        <div style="margin-top: 7%"></div>
    @endif
@endsection

@section('script')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="{{ url('js/geolocation/geolocation.js') }}"></script>
@endsection
