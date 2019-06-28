@extends('layouts.app')
@section('content')
@section('content')
<div class="container">
    <h5>Ativos</h5>
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($deliveries as $delivery)
            <tr>
                <th>{{$delivery->id}}</th>
                <th>{{$delivery->status}}</th>
                <th>{{$delivery->adress_id}}</th>
                <th>{{$delivery->payment}}</th>
                @if($delivery->status == 'open')
                <th>Em aberto</th>
                @endif --}}
                {{-- <th class="row justify-content-center" style="">
                    <form action="../produtos/{{$actives->id}}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="status" value="inactive">
                        <button type="submit" class="btn btn-sm btn-dark">Desativar</button>
                    </form>
                    <form action="../produtos/{{$actives->id}}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </th> --}}
            {{-- </tr>
            @endforeach --}}
        </tbody>
    </table>
    <div class="card-footer fixed-bottom" style="background:honeydew">
        <div class="row justify-content-center">
            <h1>Deliveries</h1>
        </div>
    </div>
</div>
</div>
@endsection
@endsection