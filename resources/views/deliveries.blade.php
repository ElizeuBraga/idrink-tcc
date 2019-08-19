@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Pedidos de hoje</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <table class="w3-table-all w3-hoverable w3-centered">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Pagamento</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($deliveries as $delivery)
            <tr>
            <td>{{$delivery->id}}</td>
                <td>Id do cliente{{$delivery->customer_id}}</td>

                {{-- Forma de Pagamento --}}
                @if ($delivery->payment == 'money')
                <td class=""><img class="" style="width: 20px" src="imgs/icons/money.png" alt="Dinheiro" title="Dinherio"></td>
                @endif
                @if ($delivery->payment == 'credit')
                <td><img style="width: 20px" src="imgs/icons/credit-card.png" alt="Crédito" title="Crédito"></td>
                @endif
                @if ($delivery->payment == 'debit')
                <td><img style="width: 20px" src="imgs/icons/debit-card.png" alt="Débito" title="Débito"></td>
                @endif

                {{-- Status --}}
                @if ($delivery->status == 'open')
                <td><img style="width: 20px" src="imgs/icons/open.png" alt="Em Aberto" title="Em aberto"></td>
                @endif
                @if ($delivery->status == 'delivered')
                <td><img style="width: 20px" src="imgs/icons/delivered.png" alt="Entregue" title="Entregue"></td>
                @endif
                @if ($delivery->status == 'canceled')
                <td><img style="width: 20px" src="imgs/icons/canceled.png" alt="Cancelado" title="Cancelado"></td>
                @endif
                <td>
                    @if ($delivery->status == 'canceled')
                    <a class="btn btn-sm btn-primary" href="#">Reativar</a>
                    @else
                    <a class="btn btn-sm btn-danger @if($delivery->status == 'delivered') disabled @endif" href="#">Cancelar</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
@section('script')
    <script>
        
    </script>
@endsection