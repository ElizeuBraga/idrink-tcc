<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>iDrink</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <style>

            body{
                background:linear-gradient(120deg, #f6d365 0%, #fda085 100%)
            }

            header > a{
                color: #ffffff;
            }

            header{
                background:linear-gradient(120deg, #f6d365 0%, #fda085 100%)
                height: 12%!important;
            }

            button{
                background-color: inherit;
                color: inherit !important;
                align-content: center;
            }

            button:hover{
                background-color: inherit;
                color: inherit !important;
            }

            #nav{
                background-image:
                color: black;
            }
            @media only screen and (max-width: 600px){
                .container{
                    margin-top: 15%;
                }
            }

            @media only screen and (min-width: 992px) {
                .container{
                    margin-top: 5.5%;
                    background: white;
                }
            }

        </style>
        @yield('style')
	</head>
	<body class="landing">
        <!-- Header -->
        <header id="header" class="alt" style="">
                <h1><a href="/" style="color:black">iDrink</a></h1>
                <a href="#nav" style="color:black">Menu</a>
            </header>
            <!-- Nav -->
            <nav id="nav" style="">
                    <ul class="links">
                        @auth
                        <li><a href="/home">Home</a></li>
                        <li><a href="{{route('deliveries.index')}}">Entregas</a></li>
                        <li><a href="{{route('products.index')}}">Produtos</a></li>
                        <li><a href="{{route('reports.index')}}">Relatórios</a></li>
                        <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Sair') }}
                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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

		<!-- One -->

		<!-- Scripts -->
        <script src="https://kit.fontawesome.com/e9e7f80931.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="js/main.js"></script>
        @yield('script')

	</body>
    </html>
