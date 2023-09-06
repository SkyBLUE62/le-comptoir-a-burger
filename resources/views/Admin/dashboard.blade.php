@extends('template.adminTemplate')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Revenue sur l'année</h5>
                                    <span class="badge bg-label-warning rounded-pill">Année <?= date('Y') ?></span>
                                </div>
                                <div class="mt-sm-auto">
                                    <h3 class="mb-0" id="yearProfitTitle">
                                    </h3>
                                </div>
                            </div>
                            <div id="yearProfit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Transactions -->
            <div class="col-md-12 col-lg-12 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Dernières Transactions</h5>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="{{ asset('admin/img/icons/unicons/wallet.png') }}" alt="User"
                                            class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Stripe Carte Bancaire</small>
                                            <h6>{{ $order['nom'] }}</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">{{ $order['prixTotal'] }}</h6>
                                            <span class="text-muted">€</span>
                                        </div>
                                    </div>
                                </li>
                                @php
                                    $i++;
                                @endphp
                                @if ($i == 6)
                                    @php
                                        break;
                                    @endphp
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Transactions -->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/chart/yearprofit.js') }}"></script>
@endsection
