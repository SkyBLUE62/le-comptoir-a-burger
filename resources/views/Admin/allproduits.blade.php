@extends('template.adminTemplate')

@section('title')
    Tous les Produits
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Les Produits /</span> Tous les Produits</h4>
        <!-- Bootstrap Dark Table -->
        @if (Session::get('notification'))
            <div class="alert alert-success alert-dismissible" id="alert" role="alert">
                {{ Session::get('notification') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Touts les Produits</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Produits</th>
                            <th>Description</th>
                            <th>Catégories</th>
                            <th class="text-center">Produit en page d'Accueil</th>
                            <th>En vente</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $i = 1; ?>
                        @foreach ($allProduit as $produit)
                            <tr>
                                <td><strong><?= $i ?></strong></td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="{{ $produit['nom'] }}">
                                            <img src="{{ url('storage/produit_images/' . $produit['imageProduit']) }}"
                                                alt="Avatar" class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td>{{ $produit['nom'] }}</td>
                                <td>
                                     {{Str::substr($produit['description'], 0, 47)."..." }}
                                </td>
                                <td>
                                    @foreach ($allCategories as $categorie)
                                        @if ($categorie['id'] == $produit['idCategories'])
                                            {{ $categorie['nom'] }}
                                        @endif
                                    @endforeach
                                </td>
                                <td
                                    style="display: flex;
                                align-items: center;
                                justify-content: center;
                                text-align: center;">
                                    @if ($produit['homepage'] == '1')
                                        <a href="/update-produit-homepage/{{ $produit['id'] }}"
                                            class="btn rounded-pill btn-outline-success">Activer</a>
                                    @else
                                        <a href="/update-produit-homepage/{{ $produit['id'] }}"
                                            class="btn rounded-pill btn-outline-danger">Désactiver</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($produit['status'] == '1')
                                        <a href="/update-produit-status/{{ $produit['id'] }}"
                                            class="btn rounded-pill btn-outline-success">Activer</a>
                                    @else
                                        <a href="/update-produit-status/{{ $produit['id'] }}"
                                            class="btn rounded-pill btn-outline-danger">Désactiver</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ url('/editer-produit/' . $produit['id']) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Éditer</a>
                                            <a class="dropdown-item"
                                                href="{{ url('/delete-produit/' . $produit['id']) }}"><i
                                                    class="bx bx-trash me-1"></i>
                                                Supprimer</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Bootstrap Dark Table -->
    </div>
@endsection

@section('script')
@endsection
