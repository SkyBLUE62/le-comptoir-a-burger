@extends('template.adminTemplate')

@section('title')
    Ajouter une Catégorie
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Catégories /</span> Ajouter une Catégorie</h4>

        <div class="row">
            <!-- Basic -->
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <h5 class="card-header">Ajouter une Catégorie</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <form action="{{ url('/add-categorie') }}" method="post"> @csrf
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Nom</span>
                                <input type="text" class="form-control" placeholder="Nom de la catégorie"
                                    aria-label="Nom du Produit" aria-describedby="basic-addon11" name="nom" />
                            </div>
                            <button type="submit" class="btn rounded-pill btn-dark mt-2">Ajouter le produit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
