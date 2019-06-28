@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Todos</h5>
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
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
                    <th class="row justify-content-center">
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
                        <form action="../produtos/{{$allProd->id}}" method="POST">
                            @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
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