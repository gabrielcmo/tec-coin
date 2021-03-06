<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TecCoin') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body class="roxo-2">
<div id="app">
     <nav class="navbar navbar-expand-lg sticky-top navbar-dark roxo-1">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{url('/images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            {{ config('app.name', 'TecCoin') }}
        </a>

        <div class="collapse navbar-collapse" id="navbarText">

            @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                </ul>
            @else

            <ul class="navbar-nav mr-auto">
                 @if (Auth::user()->user_type_id == 1)
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
                        @endif
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ ('/users') }}">Compradores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ ('/sellers') }}">Vendedores</a>
                    </li>

                    <li class="nav-item">
                            <a class="nav-link" href="{{ ('/deposit') }}">Depositar</a>
                    </li>
                @elseif (Auth::user()->user_type_id == 2)

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buyerproducts') }}">Produtos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('extract') }}">Extrato</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("user/orders/historic") }}">Histórico</a>
                    </li>

                @elseif (Auth::user()->user_type_id == 3)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Pedidos
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('pendingorders') }}">Pendentes</a>
                            <a class="dropdown-item" href="{{ url("seller/orders/historic") }}">Histórico</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Produtos
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('productsregister') }}">Cadastro</a>
                            <a class="dropdown-item" href="{{ route('sellerproducts') }}">Listagem</a>
                        </div>
                    </li>
                @endif
            </ul>


            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Conta
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <span class="dropdown-item-text">
                            <a class="purple" href="{{ route('profile') }}">
                                <div class="row">
                                    <img width="30px" height="30px" src="https://static.thenounproject.com/png/20344-200.png" class="rounded-circle">
                                    <div class="margin-dp">
                                        <strong>{{ Auth::user()->name }}</strong><br>
                                    </div>
                                </div>
                            </a>
                        </span>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

            @endguest
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
