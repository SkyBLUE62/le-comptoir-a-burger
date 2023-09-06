@extends('template.adminTemplate')

@section('title')
    Editer le produit {{ $produit['nom'] }}
@endsection
@section('css')
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produits /</span> Ajouter un Produit</h4>
        <!-- Basic -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h5 class="card-header">Ajouter un produit</h5>
                    <form action="{{ url('/editProduit/'.$produit['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body demo-vertical-spacing demo-only-element">

                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Nom</span>
                                <input type="text" class="form-control" placeholder="Nom du Produit"
                                    aria-label="Nom du Produit" aria-describedby="basic-addon11" name="nom"
                                    value="{{ $produit['nom'] }}" id="input-nom" />
                            </div>

                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect02">Catégories</label>
                                <select class="form-select" id="inputGroupSelect02" name="categorie">
                                    @foreach ($allCategories as $categorie)
                                        @if ($categorie['id'] == $produit['idCategories'])
                                            <option value="{{ $categorie['id'] }}" selected>{{ $categorie['nom'] }}</option>
                                        @else
                                            <option value="{{ $categorie['id'] }}">{{ $categorie['nom'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile02" name="image" />
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                            <div class="input-group">
                                <i class="bx bx-euro input-group-text"></i>
                                <input type="text" class="form-control" id="input-prix" placeholder="Prix" name="prix"
                                    value="{{ $produit['prix'] }}" />
                            </div>

                            <div class="input-group">
                                <span class="input-group-text">Description</span>
                                <textarea class="form-control" aria-label="With textarea" name="description" id="input-description">{{ $produit['description'] }}</textarea>
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn rounded-pill btn-dark">Editer le produit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <section class="food_section layout_padding-bottom">
                    <div class="container">
                        <div class="col-sm-12 col-lg-12 all pizza">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ asset('storage/produit_images/' . $produit['imageProduit']) }}"
                                            alt="" id="preview-img">
                                    </div>
                                    <div class="detail-box">
                                        <h5 style="color: white" id="preview-nom">
                                            {{ $produit['nom'] }}
                                        </h5>
                                        <p id="preview-description"
                                            style="height: auto;">
                                            {{ $produit['description'] }}
                                        </p>
                                        <div class="options">
                                            <h6 style="color: white" id="preview-prix">
                                                {{ $produit['prix'] }} €
                                            </h6>
                                            <a href="">
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
                    </div>
            </div>
            </section>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/js/preview/preview.js') }}"></script>
@endsection
