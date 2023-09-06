    <aside class="sidebar">
        <div class="toggle">
            <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar"
                id="hamburgerButton">
                <span></span>
            </a>
        </div>
        <div class="side-inner">

            <div class="profile">
                <h3 class="name mb-4">{{ Auth::user()->name }} <span class="icon-check_circle verified"></span></h3>
                <div class="counter d-flex">
                    <div class="col">
                        <strong class="number">0</strong>
                        <span class="number-label">Burger Coins</span>
                    </div>
                    <div class="col">
                        @if (isset($orders) && count($orders) > 1)
                            <strong class="number">@php
                                echo count($orders);
                            @endphp</strong>
                            <span class="number-label">Commandes</span>
                        @elseif(isset($orders) && count($orders) == 1)
                            <strong class="number">@php
                                echo count($orders);
                            @endphp</strong>
                            <span class="number-label">Commande</span>
                        @else
                            <strong class="number">0</strong>
                            <span class="number-label">Commande</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="tags">
                <ul>
                    @if (Request::url() == url('/mon-compte'))
                        <li><a href="{{ url('/mon-compte') }}" class="active">Mon Compte</a></li> <br>
                    @else
                        <li><a href="{{ url('/mon-compte') }}">Mon Compte</a></li> <br>
                    @endif
                    @if (Request::url() == url('/mes-commandes'))
                        <li><a href="{{ url('/mes-commandes') }}" class="active">Mes Commandes</a></li> <br>
                    @else
                        <li><a href="{{ url('/mes-commandes') }}">Mes Commandes</a></li> <br>
                    @endif
                    @if (Request::url() == url('/ajouter-adresse'))
                        <li><a href="{{ url('/ajouter-adresse') }}" class="active">Ajouter une Adresse</a></li>
                    @else
                        <li><a href="{{ url('/ajouter-adresse') }}">Ajouter une Adresse</a></li>
                    @endif
                    @if (Request::url() == url('/mettre-un-avis'))
                        <li><a href="{{ url('/mettre-un-avis') }}" class="active">Mettre un avis</a></li>
                    @else
                        <li><a href="{{ url('/mettre-un-avis') }}">Mettre un avis</a></li>
                    @endif

                </ul>
            </div>
        </div>

    </aside>
