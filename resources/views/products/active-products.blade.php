@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Ativos</h2>

    {{-- Alerts --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    {{-- end alerts --}}

    {{-- Table --}}
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
                <th class="row justify-content-center" style="">
                    <form action="../produtos/{{$actives->id}}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="status" value="inactive">
                        <button type="submit" class="btn btn-sm btn-dark">Desativar</button>
                    </form>
                    <form action="../produtos/{{$actives->id}}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- end table --}}

    @if (count($activeProducts) == 0)
    <h5>Nenhum produto encontrado</h5>
    @endif
</div>
@endsection