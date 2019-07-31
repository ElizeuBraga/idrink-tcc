<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        /* Centered text */
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 300px;
            /* color: #1fbf15; */
            color: lime;
        }
    </style>
</head>

<body>
    {{-- <div class="d-flex" id="wrapper">
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <a href="{{url('/')}}">iDrink</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                        <li class="w3-dropdown-hover">
                            <button class="w3-button">Ajuda</button>
                            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <a href="{{route('help')}}" class="w3-bar-item w3-button">Perguntas frequentes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Register<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">Perfil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <img src="/imgs/welcome/beer2.jpg" alt="Beer" style="width: 100%; height: 600px">
                <div class="centered">iDrink</div>
                <div class="">
                    <hr>
                </div>
                <img class="w3-opacity-min" src="/imgs/welcome/beer.jpg" alt="Beer" style="width: 100%; height: 600px">
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        var pathname = window.location.pathname; 
        console.log(pathname);

        switch (pathname) {
            case value: '/'
                $('')
                break;
        
            default:
                break;
        }
    </script> --}}
    @extends('layouts.app')
    @section('content')
                <img src="/imgs/welcome/beer2.jpg" alt="Beer" style="width: 100%; height: 600px">
                <div class="centered">iDrink</div>

        <p></p>
    @endsection
</body>
</html>