@extends('layouts.app')
@section('content')
<div class="container">
    
    @if ($message = Session::get('canceled'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <center><strong>{{ $message }}</strong><center>
    </div>
    @endif

    @if ($message = Session::get('actived'))
    <div class="alert alert-primary alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <center><strong>{{ $message }}</strong><center>
    </div>
    @endif    

    {{-- --------------Table deliveries-------------- --}}
    <table class="w3-table-all w3-hoverable w3-centered">
        <thead>
            <tr  style="font-size: 20px;">
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

                {{-- ----------------Modal chat-------------------- --}}
            <div id="chat{{$delivery->delivery_id}}" class="w3-modal">
                <div class="w3-modal-content w3-animate-top">
                <span onclick="document.getElementById('chat{{$delivery->delivery_id}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <center>
                    <div class="">
                        <h2>Chat</h2>
                        
                        <textarea name="chat" id="" cols="60" rows="2"></textarea>
                    </div>
                    <button class="btn btn-primary">Enviar</button>
                </center>
                </div>
            </div>

            {{-- ----------------Modal pedidos-------------------- --}}
            <div id="deliv{{$delivery->delivery_id}}" class="w3-modal">
                <div class="w3-modal-content w3-animate-top">
                <span onclick="document.getElementById('deliv{{$delivery->delivery_id}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <center>
                    <div class="">
                    <h2>Items do pedido do(a) {{$delivery->customer_name}}</h2>
                        @foreach ($items as $item)
                            @if ($item->delivery_id == $delivery->delivery_id)
                            <p>{{$item->product_id}}-{{$item->product_name}}</p>
                            @endif
                        @endforeach
                    <p>---------------------------------------------------------------------------------</p>
                    </div>
                </center>
                </div>
            </div>

            <td>{{$delivery->delivery_id}}</td>
                <td>{{$delivery->customer_name}}</td>

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
                    <form action="../entregas/editar/{{$delivery->delivery_id}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" value="open" name="status">
                        <button class="btn btn-sm btn-primary" type="submit">Reativar</button>
                    </form>
                    @else
                    <form action="../entregas/editar/{{$delivery->delivery_id}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" value="canceled" name="status">
                        <button class="btn btn-sm btn-danger @if($delivery->status == 'delivered') disabled @endif" type="submit">Cancelar</button>
                    </form>
                    @endif
                <a class="btn btn-sm btn-primary @if($delivery->status == 'delivered') disabled @endif" onclick="document.getElementById('chat{{$delivery->delivery_id}}').style.display='block'">Chat</a>                    
                <a class="btn btn-sm btn-primary @if($delivery->status == 'delivered') disabled @endif" onclick="document.getElementById('deliv{{$delivery->delivery_id}}').style.display='block'">Pedido</a>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</div>
@endsection
@section('script')
    <script>
        
    </script>
@endsection