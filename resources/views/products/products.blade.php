@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Todos</h5>
    <div class="card">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allProducts as $allProd)
                <tr>
                    <th>{{$allProd->id}}</th>
                    <th>{{$allProd->name}}</th>
                    <th>{{$allProd->price}}</th>
                    @if($allProd->status == 'active')
                    <th>Ativo</th>
                    @else
                    <th>Inativo</th>
                    @endif
                    <th>
                        <a href="#" class="btn btn-sm btn-secondary">Excluir</a>
                        <a href="#" class="btn btn-sm btn-secondary">Editar</a>
                        <a href="#" class="btn btn-sm btn-secondary">Desativar</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer fixed-bottom">
            <div class="row">
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('active')}}" >Ativos</a>
                <a class="btn btn-sm btn-primary col-md-6" href="{{route('newProduct')}}" >Novo</a>
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('inactive')}}" >Inativos</a>
            </div>
        </div>
    </div>
    </div>
    @endsection