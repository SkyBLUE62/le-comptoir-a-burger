@extends('template.template')

@section('title')
    Mes Commandes
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('/css/client/style.css') }}">
@endsection
@section('content')
@include('include.navbarClient')
    <section class="food_section layout_padding-bottom mt-3">
        <div class="container">
            @if (Session::has('notification'))
                <div class="alert alert-success text-center mt-1">
                    {{ Session::get('notification') }}
                </div>
            @endif
            <div class="heading_container heading_center mt-5">
                <h2>
                    Mes Commandes
                </h2>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="card shadow" id="card">
            <div class="card-body" id="card-body">
                <div id="responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                @if (isset($orders))
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Nom</th>
                                    <th scope="col" class="text-center">Adresse</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col"></th>
                                @else
                                    <th></th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($orders))
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($orders as $order)
                                    <tr class="table-separator">
                                        <th scope="row">
                                            {{ $order['created_at'] }}
                                        </th>
                                        <td>{{ $order['nom'] }}</td>
                                        <td>{{ $order['adresse'] }}</td>
                                        <td class="text-center">
                                            <button type="button"
                                                class="btn btn-info">{{ ucfirst($order['status']) }}</button>
                                        </td>
                                        <td class="text-center"> <a href="{{url('/commande/'.$order['id'])}}" class="btn btn-dark" target="_blank">Détail</a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @else
                                <td class="text-center">Pas encore de Commande</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 7%"></div>
@endsection

@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr.json"></script>
    <script src="js/client/navbar.js"></script>
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
