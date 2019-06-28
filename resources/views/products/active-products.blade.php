@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Ativos</h5>
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
            @foreach ($activeProducts as $actives)
            <tr>
            <th>{{$actives->id}}</th>
            <th>{{$actives->name}}</th>
            <th>{{$actives->price}}</th>
            @if($actives->status == 'active')
            <th>Ativo</th>
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
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('inactive')}}" >Inativos</a>
                <a class="btn btn-sm btn-primary col-md-6" href="{{route('newProduct')}}" >Novo</a>
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('allProducts')}}" >Todos</a>
            </div>
        </div>
    </div>
</div>
@endsection