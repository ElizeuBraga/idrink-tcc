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
            header > a{
                color: #ffffff;
            }

            #nav{
                background-image: 
                color: black;
            }
        </style>
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
                <li><a href="/reports">Relatórios</a></li>
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

        <style>

        </style>
        <div id="container">

		</div>

		<!-- One -->

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>

	</body>
</html>
