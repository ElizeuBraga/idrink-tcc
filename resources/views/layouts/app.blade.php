<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <style>
        body {
            color: #000000 !important;
        }

        .bg-light {
            background-color: #ffffff !important;
            color: #3BFF62;
            font-size: 20px;
        }

        .sidebar-heading {
            background-color: #3BFF62 !important;
            color: #000000;
        }

        a.bg-light:focus,
        a.bg-light:hover,
        button.bg-light:focus,
        button.bg-light:hover {
            background-color: #3BFF62 !important;
            color: #000000;
        }

        .sair.bg-light:hover{
            background-color: #F22E2E !important;
        }
    </style>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @auth('web')
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading" style="background-color: #3BFF62;">iDrink</div>
            <div class="list-group list-group-flush">
                <a href="{{route('home')}}" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="{{route('delivery')}}" class="list-group-item list-group-item-action bg-light">Entregas</a>
                <a href="{{route('report')}}" class="list-group-item list-group-item-action bg-light">Relatorios</a>
                <a href="{{route('allProducts')}}" class="list-group-item list-group-item-action bg-light">Produtos</a>
                {{-- <a href="{{route('profile')}}" class="list-group-item list-group-item-action bg-light">Perfil</a>
                --}}
                <a class="list-group-item list-group-item-action bg-light sair" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Sair') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        @endauth
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                @auth('web')
                <img src="imgs/icons/menu.png" id="menu-toggle" alt="" style="width: 20px; height: 20px">
                @endauth
                @guest
                <a href="{{url('/')}}">iDrink</a>
                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('help')}}">Ajuda<span class="sr-only">(current)</span></a>
                        </li>
                        @auth
                            
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">Perfil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endauth
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