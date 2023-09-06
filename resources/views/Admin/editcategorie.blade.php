@extends('template.adminTemplate')
@section('title')
    Editer la Catégorie {{ $categorie['nom'] }}
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Catégories /</span> Ajouter une Catégorie</h4>

        <div class="row">
            <!-- Basic -->
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <h5 class="card-header">Editer la Catégorie {{ $categorie['nom'] }}</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <form action="{{ url('/edit-categorie/' . $categorie['id']) }}" method="post"> @csrf
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Nom</span>
                                <input type="text" class="form-control" placeholder="{{ $categorie['nom'] }}"
                                    aria-label="Nom du Produit" aria-describedby="basic-addon11" name="nom"
                                    value="{{ $categorie['nom'] }}" />
                            </div>
                            <button type="submit" class="btn rounded-pill btn-dark mt-2">Mettre à jour</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
