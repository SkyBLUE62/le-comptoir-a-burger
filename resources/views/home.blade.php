@extends('template.template')
@section('title')
    Home
@endsection
@section('content')
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Le Comptoir à Burger
                                    </h1>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum sapiente ad
                                        molestias, praesentium voluptates dicta. Debitis, vel totam. Magnam eos veniam,
                                        perferendis ipsum aliquam quisquam laborum ipsam deserunt id alias?Ullam obcaecati
                                        quidem voluptatum.
                                    </p>
                                    <div class="btn-box">
                                        <a href="{{ url('/nos-menus') }}" class="btn1">
                                            Nos Menus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Le Comptoir à Burger
                                    </h1>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum sapiente ad
                                        molestias, praesentium voluptates dicta. Debitis, vel totam. Magnam eos veniam,
                                        perferendis ipsum aliquam quisquam laborum ipsam deserunt id alias?Ullam obcaecati
                                        quidem voluptatum.
                                    </p>

                                    <div class="btn-box">
                                        <a href="{{ url('/nos-menus') }}" class="btn1">
                                            Nos Menus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Le Comptoir à Burger
                                    </h1>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum sapiente ad
                                        molestias, praesentium voluptates dicta. Debitis, vel totam. Magnam eos veniam,
                                        perferendis ipsum aliquam quisquam laborum ipsam deserunt id alias?Ullam obcaecati
                                        quidem voluptatum.
                                    </p>
                                    <div class="btn-box">
                                        <a href="{{ url('/nos-menus') }}" class="btn1">
                                            Nos Menus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>

    </section>
    <!-- end slider section -->
    </div>
    <!-- food section -->

    <section class="food_section layout_padding-bottom mt-3">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Nos Meilleures Ventes
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                @foreach ($Allcategories as $categorie)
                    <li data-filter=".{{ $categorie['nom'] }}">{{ $categorie['nom'] }}</li>
                @endforeach

            </ul>
            <div class="filters-content">
                <div class="row grid">
                    @foreach ($Allproduits as $produit)
                        @if ($produit['status'] == '1' && $produit['homepage'] == '1')
                            @foreach ($Allcategories as $categorie)
                                @if ($produit['idCategories'] == $categorie['id'])
                                    <div class="col-sm-6 col-lg-4 all {{ $categorie['nom'] }}">
                                @endif
                            @endforeach
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="storage/produit_images/{{ $produit['imageProduit'] }}" alt="">
                                    </div>
                                    <div class="detail-box" style="height: 12rem">
                                        <div class="row">
                                            <h5>
                                                {{ $produit['nom'] }}
                                            </h5>
                                        </div>
                                        <div class="row">

                                            <p>
                                                {{ $produit['description'] }}

                                            </p>
                                        </div>

                                        <div class="options d-flex"
                                            style="  display: flex;
                                        align-items: flex-end;
                                        justify-content: space-between;
                                        position: absolute;
                                        bottom: 5%;
                                        width: 90%;">
                                            <h6>
                                                {{ $produit['prix'] . ' €' }}
                                            </h6>
                                            <a href="{{ url('/ajouter-au-panier/' . $produit['id']) }}">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 456.029 456.029"
                                                    style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                       c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                       C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                       c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                       C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                       c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                View More
            </a>
        </div>
        </div>
    </section>

    <!-- end food section -->

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container  ">

            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Qui sommes-nous ?
                            </h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa numquam reiciendis ea excepturi
                            vero expedita at commodi sed voluptatibus accusantium culpa error ratione iure aspernatur,
                            asperiores dicta eius suscipit labore.Officiis fuga, vero debitis dolore architecto voluptatem,
                            ab quis reiciendis cupiditate doloremque in nam qui aliquid illum voluptate et voluptas
                            necessitatibus atque quidem libero. Est laboriosam impedit iusto harum provident?
                        </p>
                        <a href="{{url('/à-propos-de-nous')}}">
                            Voir Plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom mt-5">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    Avis de nos clients
                </h2>
            </div>
            <div class="carousel-wrap row ">
                <div class="owl-carousel client_owl-carousel">
                    @foreach ($Allavis as $avis)
                        <div class="item">
                            <div class="box">
                                <div class="detail-box" style="height:13rem">
                                    <p>
                                        {{ $avis['contenue'] }}
                                    </p>
                                    <h6>
                                        {{ $avis['nom'] }}
                                    </h6>
                                    <p>
                                        {{ $avis['created_at'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->
@endsection
