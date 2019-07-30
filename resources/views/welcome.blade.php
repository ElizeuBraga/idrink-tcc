<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            color: #000000 !important;
        }

        .bg-light {
            background-color: #3BFF62 !important;
            font-weight: bold !important;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @auth('web')
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">iDrink</div>
            <div class="list-group list-group-flush">
                <a href="{{route('home')}}" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="{{route('delivery')}}" class="list-group-item list-group-item-action bg-light">Entregas</a>
                <a href="{{route('report')}}" class="list-group-item list-group-item-action bg-light">Relatorios</a>
                <a href="{{route('allProducts')}}" class="list-group-item list-group-item-action bg-light">Produtos</a>
                {{-- <a href="{{route('profile')}}" class="list-group-item list-group-item-action bg-light">Perfil</a>
                --}}
                <a class="list-group-item list-group-item-action bg-light" href="{{ route('logout') }}"
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
                <button class="btn btn-primary" id="menu-toggle">Menu</button>
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
                            <a class="nav-link" href="#">Cadastre-se<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('help')}}">Ajuda<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">iDrink</h1>
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
    </script>
</body>

</html>