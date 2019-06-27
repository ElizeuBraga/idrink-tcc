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
    <a href="{{route('newProduct')}}" class="btn btn-sm btn-primary">Novo</a>
    <a href="{{route('allProducts')}}" class="btn btn-sm btn-primary">Todos</a>
    <a href="{{route('active')}}" class="btn btn-sm btn-primary">Ativos</a>
    <a href="{{route('inactive')}}" class="btn btn-sm btn-primary">Inativos</a>
</div>
@endsection