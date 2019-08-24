<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{ asset('css/simple-sidebar.css')}}" rel="stylesheet">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @auth('web')
        @if(Request::path() == '/')
        @else
        <div class="bg-light border-right" id="sidebar-wrapper">
            <a href="/"><div class="sidebar-heading" style="background-color: #3BFF62;">{{config('app.name')}}</div></a>
            <div class="list-group list-group-flush">
                <a href="{{route('home')}}"
                    class="{{ Request::path() == 'home' ? 'active' : '' }} list-group-item list-group-item-action bg-light">Home</a>
                <a href="{{route('delivery')}}"
                    class="{{ Request::path() == 'entregas' ? 'active' : '' }} list-group-item list-group-item-action bg-light">Entregas</a>
                <a href="{{route('report')}}"
                    class="{{ Request::path() == 'relatorios' ? 'active' : '' }} list-group-item list-group-item-action bg-light">Relatorios</a>
                <a class="{{ Request::path() == 'produtos' ? 'active' : '' }} list-group-item list-group-item-action bg-light"
                    data-toggle="collapse" href="#colapse-menu" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    Produtos
                </a>
                <div class="collapse colapse-menu" id="colapse-menu">
                    <a class="{{ Request::path() == 'produtos/novos' ? 'active-prod' : '' }} list-group-item list-group-item-action bg-light"
                        href="{{route('newProduct')}}">Novo produto</a>
                    <a class="{{ Request::path() == 'produtos' ? 'active-prod' : '' }} list-group-item list-group-item-action bg-light"
                        href="{{route('allProducts')}}">Todos</a>
                    <a class="{{ Request::path() == 'produtos/ativos' ? 'active-prod' : '' }} list-group-item list-group-item-action bg-light"
                        href="{{route('active')}}">Ativos</a>
                    <a class="{{ Request::path() == 'produtos/inativos' ? 'active-prod' : '' }} list-group-item list-group-item-action bg-light"
                        href="{{route('inactive')}}">Inativos</a>
                </div>
                <a class="list-group-item list-group-item-action bg-light sair" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Sair') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        @endif
        @endauth
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-fixed-top">
                @auth('web')
                @if (Request::path() == '/')
                <a href="{{url('/')}}" class="idrink">{{config('app.name')}}</a>
                @else
                <a href=""><img class="" src="imgs/icons/menu.png" id="menu-toggle" alt=""
                        style="width: 20px; height: auto"></a>

                @endif
                @endauth
                @guest
                <a href="{{url('/')}}" class="idrink">{{config('app.name')}}</a>
                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="w3-dropdown-hover">
                            <button class="w3-button" style="background:white;">Ajuda</button>
                            <div class="w3-dropdown-content w3-card-4">
                                <a href="{{route('help')}}" class="w3-bar-item w3-button ">Perguntas frequentes</a>
                                <a href="{{route('help')}}" class="w3-bar-item w3-button ">Outras</a>
                            </div>
                        </li>
                        <li class="w3-bar">
                            <a class="w3-bar-item w3-button  " href="#about">Sobre o {{config('app.name')}}</a>
                        </li>
                        <li class="w3-dropdown-hover">
                            <button class="w3-button" style="background:white;">Area do usuario</button>
                            <div class="w3-dropdown-content w3-card-4">
                                @auth
                                <a href="{{route('home')}}" class="w3-bar-item w3-button">Home</a><br>
                                <a class="w3-bar-item w3-button sair"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                                @endauth
                                @guest
                                <a href="{{route('login')}}" class="w3-bar-item w3-button ">Login</a>
                                <a href="{{route('register')}}" class="w3-bar-item w3-button ">Cadastre-se</a>
                                @endguest
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
                              e.preventDefault();
                              $("#wrapper").toggleClass("toggled");
                            });
    </script>
</body>

</html>