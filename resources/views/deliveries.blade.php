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
            <tr>
                {{-- {{dd($deliveries)}} --}}
            @foreach ($deliveries as $key => $value)
                Chave => {{$key}}<br>
                Valor => {{$value}}<br>    
            @endforeach
            </th>
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