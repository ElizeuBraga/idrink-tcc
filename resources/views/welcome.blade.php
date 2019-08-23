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
    @extends('layouts.app')
    @section('content')
                <img src="/imgs/welcome/welcome.png" alt="Beer" style="width: 100%; height: 600px">
                {{-- <div class="centered"><div class="w3-animate-zoom">iDrink</div></div> --}}

        <p></p>
    @endsection
</body>
</html>