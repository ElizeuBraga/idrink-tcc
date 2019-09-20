@extends('layouts.app')
@section('style')
    <style>
        .container{
            width: 98%!important;
        }

        h2{
            color: black;
        }

        tr{
            color: black;
            font-size: 17px;
        }

        .fa-trash{
            color: red;
        }

        .fa-edit{
            color: green;
        }

        button:focus{
            outline: inherit;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <center><h2>Todos os produtos</h2></center>
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <table class="">
        <thead>
            <tr class="w3-hover-green">
                <th>#</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allProducts as $allProd)
            <tr>
                <td>{{$allProd->id}}</td>
                <td>{{$allProd->name}}</td>
                <td>{{$allProd->price}}</td>
                <td><button><i class="fas fa-trash"></i></button></td>
                <td><button><i class="fas fa-edit"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
    <script>

    </script>
@endsection
