@extends('template.adminTemplate')

@section('title')
    Toutes les Commandes
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
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
            <h5 class="card-header">Toutes les Commandes</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-dark" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Nom</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($orders as $order)
                            <tr>
                                <td><strong>{{ $order['id'] }}</strong></td>
                                <td>{{ $order['created_at'] }}</td>
                                <td>
                                    {{ $order['nom'] }}
                                </td>
                                <td>
                                    <form action="/update-status-order/{{ $order['id'] }}" method="post"
                                        onchange="this.submit();">@csrf
                                        <select id="defaultSelect" class="form-select" name="status"
                                            <?= $order['status'] == 'Annulé' ? 'disabled' : '' ?>>
                                            <option value="payer" name="status"
                                                <?= $order['status'] == 'payer' ? 'selected' : '' ?>>
                                                Payer
                                            </option>
                                            <option value="préparation" name="status"
                                                <?= $order['status'] == 'préparation' ? 'selected' : '' ?>>En préparation
                                            </option>
                                            <option value="livraison" name="status"
                                                <?= $order['status'] == 'livraison' ? 'selected' : '' ?>>
                                                En cours de livraison</option>
                                            <option value="Livrée" name="status"
                                                <?= $order['status'] == 'Livrée' ? 'selected' : '' ?>>
                                                Livrée
                                            </option>
                                            <option value="Annulé" name="status"
                                                <?= $order['status'] == 'Annulé' ? 'selected' : '' ?>>
                                                Annulé
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('/commande/' . $order['id']) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Détails</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Bootstrap Dark Table -->
    </div>
@endsection
@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr.json"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json'
                }
            });
        });

        if (window.innerWidth < 768) {
            document.getElementById('responsive').classList.add('table-responsive');
        }
    </script>
@endsection
