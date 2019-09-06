<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Styles -->
    <style>
        /* Centered text */
        nav{
            position: fixed !important;
            width: 100%;
        }
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 300px;
            /* color: #1fbf15; */
            color: lime;
        }

        #others{

        }

        .link-foot{
            font-size: 18px;
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <section id="welcome" class="main">
        <img src="/imgs/welcome/welcome.png" alt="Beer" style="width: 100%; height: 600px">
        {{-- <div class="centered"><div class="w3-animate-zoom">iDrink</div></div> --}}
        
            <h1 class="display-4 u-fw-600 text-white u-mb-40">
                Com o iDrink<br>
                <span class="text-yellow" data-type="Desenvolvedores, Iniciantes, Profissionais, Sonhadores, Você!">Desenvol</span>
                <span class="typed-curcor text-yellow">|</span>
            </h1>
    </section>
    <section id="about" class="main">
            <img src="/imgs/welcome/about.png" alt="Beer" style="width: 100%; height: 600px">
    </section>
    <section id="others" class="main">

    <!-- Footer -->
    <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer row">
        <div class="col-md-4 row">
            <h2>Contato</h2>
            <a href="" class="link-foot col-md-12">Link 1</a>            
            <a href="" class="link-foot col-md-12">Link 2</a>            
            <a href="" class="link-foot col-md-12">Link 3</a>            
            <a href="" class="link-foot col-md-12">Link 4</a>
        </div>
        <div class="col-md-4 row">
            <h2>iDrink</h2>
            <a href="" class="link-foot col-md-12">Link 1</a>            
            <a href="" class="link-foot col-md-12">Link 2</a>            
            <a href="" class="link-foot col-md-12">Link 3</a>            
            <a href="" class="link-foot col-md-12">Link 4</a>            
        </div>
        <div class="col-md-4 row">
            <h2>Expectativas</h2>
            <a href="" class="link-foot col-md-12">Link 1</a>            
            <a href="" class="link-foot col-md-12">Link 2</a>            
            <a href="" class="link-foot col-md-12">Link 3</a>            
            <a href="" class="link-foot col-md-12">Link 4</a>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">
        © 2019 Copyright: iDrink
    </div>
    <!-- Copyright -->
    </footer>
    <!-- Footer -->
    </section>
    @endsection
</body>
</html>