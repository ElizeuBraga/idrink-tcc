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
            <tr>
                <th>1</th>
                <th>Teste</th>
                <th>3.00</th>
                <th>Ativo</th>
                <th>
                    <a href="#" class="btn btn-sm btn-secondary">Excluir</a>
                    <a href="#" class="btn btn-sm btn-secondary">Editar</a>
                    <a href="#" class="btn btn-sm btn-secondary">Desativar</a>
                </th>
            </tr>
        </tbody>
    </table>
    <a href="#" class="btn btn-sm btn-primary">Novo</a>
    <a href="{{route('active')}}" class="btn btn-sm btn-primary">Ativos</a>
    <a href="{{route('inactive')}}" class="btn btn-sm btn-primary">Inativos</a>
</div>
@endsection