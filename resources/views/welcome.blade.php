<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="js/jquery-3.4.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .container {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 10px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                /* margin: 0px 0px 0px 20px */
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn-primary{
                background: #39d128ff;
                color: white!important;
                font-family: Arial;
                font-size: 15px!important;
                border-radius: 50px;
                font-weight: 600;
                padding: 10px;
                border: none;
                /* margin: 0px 0px 0px 80px */
            }

            .btn-primary:hover{
                background: green;
            }

            .col-md-6 > .btn{
                margin: 0px 120px 0px 120px;
                padding: 10px 50px 10px 50px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-primary" href="{{ route('register') }}">Cadastrar</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h2>iDrink</h2>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <img src="/imgs/logo.svg" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="#">Perguntas frequentes</a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="#">Ajuda</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
