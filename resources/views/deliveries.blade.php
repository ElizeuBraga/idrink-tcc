@extends('layouts.app')
@section('content')

<div class="container">

    {{-- Alerts --}}
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
    {{-- end alerts --}}

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
                {{-- Modal chat --}}
                <div id="chat{{$delivery->delivery_id}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top">
                    <span onclick="document.getElementById('chat{{$delivery->delivery_id}}').style.display='none'" class="btn btn-danger w3-display-topright">&times;</span>
                    <center>
                        <div class="">
                        <h2>Converse com {{$delivery->customer_name}}</h2>
                            
                            <textarea name="chat" id="" cols="60" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary">Enviar</button>
                    </center>
                    </div>
                </div>
                {{-- end modal chat --}}

                {{-- Modal pedidos --}}
                @php
                $delivery_total = 0;
                @endphp
            <div id="deliv{{$delivery->delivery_id}}" class="w3-modal">
                <div class="w3-modal-content w3-animate-top">
                    <span onclick="document.getElementById('deliv{{$delivery->delivery_id}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <center>
                        <div class="">
                            <h2>Items do pedido do(a) {{$delivery->customer_name}}</h2>
                            <div class="row" style="font-weight: bold; font-size: 18px">
                                    <span class="col-md-1">Id</span>
                                    <span class="col-md-4">Produto</span>
                                    <span class="col-md-2">Valor</span>
                                    <span class="col-md-2">Quantidade</span>    
                                    <span class="col-md-3">Total</span>    
                            </div>
                            @foreach ($items as $item)
                            @if ($item->delivery_id == $delivery->delivery_id)
                            <div class="row">
                                <span class="col-md-1">{{$item->product_id}}</span>
                                <span class="col-md-4">{{$item->product_name}}</span>
                                <span class="col-md-2">{{number_format($item->price, 2)}}</span>
                                <span class="col-md-2">{{$item->quantity}}</span>
                                <span class="col-md-3">{{number_format($item->total, 2)}}</span>
                            </div>
                            @php
                                $delivery_total += $item->total;
                            @endphp
                            @endif
                            @endforeach
                            <div class="row">
                                <span class="col-md-12">-----------------------------------------------------------------------------------------------------------------------------------------------------</span>
                            </div>
                            <div class="row">
                                <span class="col-md-4 text-left"><strong>Cobrar do cliente</strong></span>
                                <span class="col-md"></span>
                                <span class="col-md"></span>
                                <span class="col-md"></span>
                                <span class="col-md-3">R$ - {{number_format($delivery_total, 2)}}</span>
                            </div>
                        </div>
                    </center>
                </div>
            </div>

            <td>{{$delivery->delivery_id}}</td>
                <td>{{$delivery->customer_name}}</td>

                {{-- Forma de Pagamento --}}
                @if ($delivery->payment == 'money')
                <td>
                    <img class="" style="width: 20px" src="imgs/icons/money.png" alt="Dinheiro" title="Dinherio">
                </td>
                @endif
                @if ($delivery->payment == 'credit')
                <td>
                    <img style="width: 20px" src="imgs/icons/credit-card.png" alt="Crédito" title="Crédito">
                </td>
                @endif
                @if ($delivery->payment == 'debit')
                <td>
                    <img style="width: 20px" src="imgs/icons/debit-card.png" alt="Débito" title="Débito">
                </td>
                @endif
                {{-- end forma de pagamento --}}

                {{-- Status --}}
                @if ($delivery->status == 'open')
                <td>
                    <img style="width: 20px" src="imgs/icons/open.png" alt="Em Aberto" title="Em aberto">
                </td>
                @endif
                @if ($delivery->status == 'delivered')
                <td>
                    <img style="width: 20px" src="imgs/icons/delivered.png" alt="Entregue" title="Entregue">
                </td>
                @endif
                @if ($delivery->status == 'canceled')
                <td>
                    <img style="width: 20px" src="imgs/icons/canceled.png" alt="Cancelado" title="Cancelado">
                </td>
                @endif
                {{-- end status --}}

                <div class="row">
                    <td>
                        @if ($delivery->status == 'canceled')
                        <form action="../entregas/editar/{{$delivery->delivery_id}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" value="open" name="status">
                            <button class="btn btn-sm btn-primary col-md-3" type="submit">Reativar</button>
                        </form>
                        @else
                        <form action="../entregas/editar/{{$delivery->delivery_id}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" value="canceled" name="status">
                            <button class="btn btn-sm btn-danger col-md-3 @if($delivery->status == 'delivered') disabled @endif" type="submit">Cancelar</button>
                        </form>
                        @endif
                        <a class="btn btn-sm btn-primary col-md-3 @if($delivery->status == 'delivered') disabled @endif" onclick="document.getElementById('chat{{$delivery->delivery_id}}').style.display='block'">Chat</a>                    
                        <a class="btn btn-sm btn-primary col-md-3 @if($delivery->status == 'delivered') disabled @endif" onclick="document.getElementById('deliv{{$delivery->delivery_id}}').style.display='block'">Pedido</a>                    
                    </td>
                </div>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- end table deliveries--}}
</div>
@endsection

@section('script')
    <script>
        
    </script>
@endsection