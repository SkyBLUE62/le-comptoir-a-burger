@extends('template.adminTemplate')

@section('title')
    Toutes les Categories
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Les Catégories /</span> Toutes les Catégories</h4>
        <!-- Bootstrap Dark Table -->
        @if (Session::get('notification'))
            <div class="alert alert-success alert-dismissible" id="alert" role="alert">
                {{ Session::get('notification') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Toutes les catégories</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Catégories</th>
                            <th>Produits</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $i = 1; ?>
                        @foreach ($allCategories as $categorie)
                            <tr>
                                <td><strong><?= $i ?></strong></td>
                                <td>{{ $categorie['nom'] }}</td>
                                <td>
                                    @if (isset($allProduit))
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">

                                            @foreach ($allProduit as $produit)
                                                @if ($produit['idCategories'] == $categorie['id'])
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                        title="{{ $produit['nom'] }}">
                                                        <img src="{{url('storage/produit_images/'.$produit['imageProduit'])}}" alt="Avatar"
                                                            class="rounded-circle" />
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
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
                                                href="{{ url('/editer-categorie/' . $categorie['id']) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Éditer</a>
                                            <a class="dropdown-item"
                                                href="{{ url('/delete-categorie/' . $categorie['id']) }}"><i
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
