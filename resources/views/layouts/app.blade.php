<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    
    <head>
        <script>
            window.Laravel = {!! json_encode([
                'user' => auth()->check() ? auth()->user()->id : null,
            ]) !!};
        </script>
    <title>iDrink</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        @yield('link')
    <link rel="stylesheet" href="{{ elixir('css/main.css')}}" />
    <style>
        body {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            font-family: 'Roboto', sans-serif;
        }

        header>a {
            color: #ffffff;
        }

        header {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%) height: 12% !important;
        }

        button {
            background-color: inherit;
            color: inherit !important;
            align-content: center;
        }

        button:hover {
            background-color: inherit;
            color: inherit !important;
        }

        #nav {
            background-image:
                color: black;
        }

        @media only screen and (max-width: 992px) {
            .container {
                min-width: 98% !important;
                margin-top: 15%;
                background: white;
            }
        }

        @media only screen and (min-width: 992px) {
            .container {
                min-width: 95% !important;
                margin-top: 5.5%;
                background: white;
            }
        }

        .avatar {
            vertical-align: middle;
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }

        </
    </style>
    @yield('style')
</head>

<body class="landing">
    <div id="app">
        @auth
        @php
        $user = Auth::user();
        @endphp
        @endauth
        <!-- Header -->
        <header id="header" class="alt" style="">
            <h1><a href="/" style="color:black">iDrink</a></h1>
            <a href="#nav" style="color:black">Menu</a>
        </header>
        <!-- Nav -->
        <nav id="nav" style="">
                <div style="background: white; border-radius: 2%; color:black; font-weight: bold;" class="text-center">
                        @auth
                <img src="/images/avatar/{{$user->avatar}}" alt="Avatar" class="avatar">
                <p>{{$user->id}}</p>
                <p>{{$user->name}}</p>
                @endauth
            </div>
            <ul class="links">
                @auth
                <li><a href="/home">Home</a></li>
                <li><a href="{{route('users.show', $user->id)}}">Perfil</a></li>
                <li><a href="{{route('deliveries.index')}}">Entregas</a></li>
                <li><a href="{{route('products.index')}}">Produtos</a></li>
                <li><a href="{{route('reports.index')}}">Relat??rios</a></li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @method('POST')
                        @csrf
                    </form>
                    <a href="/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Sair') }}
                    </a>
                </li>
                @endauth
                @guest
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Cadastre-se</a></li>
                @endguest
            </ul>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- One -->
    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/skel.min.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/e9e7f80931.js"></script>
    <script>
        var host = window.location.hostname;
        var items = {!!json_encode($items)!!};
        var del = {!!json_encode($deliveries)!!};
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // console.log(window.Laravel.user);
        // var d = null;
        // Echo.private('user.' + window.Laravel.user)
        // .listen('PrivateEvent', (data) => {
        //     console.log(data);
        // });
        
        // console.log(d);
        </script>
    {{-- @yield('script') --}}
</body>
</html>