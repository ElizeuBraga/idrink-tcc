@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Pedidos de hoje</h2>
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
                <th>Pagamento</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($delivery as $del)
            <tr>
                <th>{{$del->delivery_id}}</th>
                <th>{{$del->customer_name}}</th>
                <th>{{$del->payment}}</th>
                <th class="row justify-content-center" style="">
                    <form action="#" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="status" value="inactive">
                        <button type="submit" class="btn btn-sm btn-danger">Cancelar</button>
                    </form>
                    <form action="#" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-success">Despachar</button>
                    </form>
                <a class="btn btn-sm btn-info" data-toggle="collapse" href="#colapse-{{$del->delivery_id}}" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        Dados do pedido
                </a>
                <div class="collapse" id="colapse-{{$del->delivery_id}}">
                        <div class="">
                            Itens aqui
                        </div>
                </div>
                </tr>
            </th>
            @endforeach
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
@section('script')
    <script>
        
    </script>
@endsection