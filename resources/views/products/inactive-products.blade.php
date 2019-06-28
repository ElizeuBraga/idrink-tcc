@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Inativos</h5>
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
            @foreach ($inactiveProducts as $inactives)
                <tr>
                <th>{{$inactives->id}}</th>
                <th>{{$inactives->name}}</th>
                <th>{{$inactives->price}}</th>
                @if($inactives->status == 'inactive')
                <th>Inativo</th>
                @endif
                    <th class="row">
                        <form action="../produtos/ativar/{{$inactives->id}}" method="POST">
                            @csrf @method('PUT')
                                <input type="hidden" name="status" value="active">
                                <button type="submit" class="btn btn-sm btn-success">Ativar</button>
                        </form>
                        <form action="../produtos/{{$inactives->id}}" method="POST">
                            @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
    </table>
    <div class="card-footer fixed-bottom" style="background:honeydew">
            <div class="row justify-content-center">
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('active')}}" >Ativos</a>
                <a class="btn btn-sm btn-primary col-md-6" href="{{route('newProduct')}}" >Novo</a>
                <a class="btn btn-sm btn-primary col-md-3" href="{{route('allProducts')}}" >Todos</a>
            </div>
        </div>
    </div>
</div>
@endsection