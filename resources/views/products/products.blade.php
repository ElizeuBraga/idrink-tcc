@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Todos</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="card">

        <table class="w3-table-all w3-hoverable">
            <thead>
                <tr class="w3-hover-green">
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
                    <th class="row">
                        <form action="../produtos/{{$allProd->id}}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        <form action="../produtos/ativar/{{$allProd->id}}" method="POST">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="active">
                            @if ($allProd->status == 'inactive')
                            <button type="submit" class="btn btn-sm btn-success">Ativar</button>
                            @endif
                        </form>
                        <form action="../produtos/{{$allProd->id}}" method="POST">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="inactive">
                            @if ($allProd->status == 'active')
                            <button type="submit" class="btn btn-sm btn-dark">Desativar</button>
                            @endif
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer fixed-bottom">
            <div class="row">
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('active')}}">Ativos</a>
                <a class="btn btn-sm btn-primary col-md-6" href="{{route('newProduct')}}">Novo</a>
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('inactive')}}">Inativos</a>
            </div>
        </div>
        @if (count($allProducts) == 0)
        <h5>Nenhum produto encontrado</h5>
        @endif
    </div>
</div>
@endsection