@extends('template.template')

@section('title')
    Mon Compte
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/client/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
@section('content')
    <section class="food_section layout_padding-bottom mt-3">
        <div class="container">
            @include('include.navbarClient')

            <div class="heading_container heading_center">
                <h2>
                    Mes adresses
                </h2>
            </div>
            <div class="row grid">
                @if (isset($adresses))
                    @foreach ($adresses as $adresse)
                        <div class="col-sm-4 col-lg-4 all ">
                            <div class="box">
                                <div>
                                    <div id="map{{ $adresse['id'] }}" style="height: 200px"></div>

                                    <div class="detail-box" style="height: 7rem">
                                        <div class="row">
                                            <h5>
                                                {{ $adresse['adresse'] }}
                                            </h5>
                                        </div>
                                        <div class="row">
                                            <p>
                                                {{ $adresse['codePostal'] }}, {{ $adresse['ville'] }}<br>
                                                {{ $adresse['pays'] }}
                                            </p>
                                        </div>

                                        <div class="options d-flex"
                                            style="  display: flex;
                                    align-items: flex-end;
                                    justify-content: space-between;
                                    position: absolute;
                                    bottom: 5%;
                                    width: 90%;">
                                            <h6></h6>
                                            <a href="{{ url('/delete-adresse/' . $adresse['id']) }}">
                                                <img src="{{ asset('images/trash.png') }}" alt="" srcset="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if (!isset($adresses))
                <h3 class="text-center mt-3">Aucune adresse pour le moment</h3>
            @endif
        </div>
    </section>
    <input type="hidden" id="idUser" value="{{ Auth::user()->id }}">
    @if (!isset($adresses))
    <div style="margin-bottom: 37vh"></div>
    @endif
@endsection

@section('script')
    <script src="js/client/navbar.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="{{ url('js/geolocation/geolocation.js') }}"></script>
@endsection
