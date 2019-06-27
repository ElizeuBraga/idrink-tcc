@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Todos</h5>
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
    <a href="{{route('newProduct')}}" class="btn btn-sm btn-primary">Novo</a>
    <a href="{{route('active')}}" class="btn btn-sm btn-primary">Ativos</a>
    <a href="{{route('inactive')}}" class="btn btn-sm btn-primary">Inativos</a>
</div>
@endsection