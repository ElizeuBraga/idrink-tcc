@extends('layouts.app')
@section('style')
<style>
    /* style */

    .fa-times-circle, .fa-motorcycle, .fa-search{
        margin-left: 5%;
    }
</style>
@endsection

@section('content')
{{-- content --}}
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead class="thead-inverse">
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Região</th>
                    <th class="">Pagamento</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveries as $d)
                <tr class="">
                    {{-- <td scope="row"></td> --}}
                    <td>{{$d->id}}</td>
                    <td>{{$d->customer_name}}</td>
                    <td>{{$d->logradouro}}</td>
                    @if ($d->payment == 'money')
                    <td class=""><i class="fas fa-money-bill-wave"
                            style="color: green;"></i> - {{number_format($d->change, 2)}}</td>
                    @elseif($d->payment == 'credit')
                    <td class=""><i class="far fa-credit-card" style="color: blue;"></i></td>
                    @else
                    <td class=""><i class="far fa-credit-card" style="color: orange;"></i></td>
                    @endif
                    <td>
                        <a href="#" data-toggle="modal"
                            data-target=".bd-example-modal-lg{{$d->id}}">
                            <i class="fas fa-search" title="Visualizar pedido"></i>
                    </a>
                        <a href="#" data-toggle="modal"
                            data-target=".bd-example-modal-lg{{$d->id}}">
                <i class="fas fa-motorcycle {{$d->status == 'delivered' ? 'fa-spin' : ''}}" style="color: green;" title="{{$d->status == 'delivered' ? 'A caminho' : 'Despachar'}}"></i>
                    </a>
                        <a href="#" data-toggle="modal"
                            data-target=".bd-example-modal-lg{{$d->id}}">
                            <i class="fas fa-times-circle" style="color: red;" title="Cancelar entrega"></i>
                    </a>
                    </td>
                </tr>

                <!-- Modal pedidos-->
                <div class="modal fade bd-example-modal-lg{{$d->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <h1>{{$d->customer_name}}</h1>
                            <hr>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Produto</div>
                                <div class="col-2 text-center font-weight-bold">Quantidade</div>
                                <div class="col-2 text-center font-weight-bold">Valor</div>
                                <div class="col-4 text-center font-weight-bold">Valor parcial</div>
                            </div>
                            @php
                            $total_price = 0;
                            @endphp
                            @foreach ($items as $i)
                            @if ($i->delivery_id == $d->id)
                            @php
                            $total_price += $i->parcial_price;
                            @endphp
                            <div class="row">
                                <div class="col-4">
                                    {{$i->product_name}}
                                </div>
                                <div class="col-2 text-center">
                                    {{$i->quantity}}

                                </div>
                                <div class="col-2 text-center">
                                    {{number_format($i->price, 2)}}

                                </div>
                                <div class="col-4 text-center">

                                    {{number_format($i->parcial_price, 2)}}
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <hr>
                            <div class="row">
                                <div class="col-8">Total</div>
                                <div class="col-4 text-center">{{number_format($total_price, 2)}}</div>
                            </div>
                            <div class="row">
                                <div class="col-8">Telefone</div>
                                <div class="col-4 text-center">{{$d->phone}}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Endereço</div>
                                <div class="col-8 text-right">
                                    {{$d->localidade}}, {{$d->logradouro}}, {{$d->complemento}}, {{$d->numero}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="collapse" style="" id="collapseExample{{$d->id}}">
                <div class="">
                    <hr>
                    <h4>{{$d->customer_name}}</h4>
                    @foreach ($items as $i)
                    @if ($d->id == $i->delivery_id)
                    <div class="row">
                        <div class="col-1">
                            {{$i->delivery_id}}<br>
                        </div>
                        <div class="col-7">
                            {{$i->product_name}}<br>
                        </div>
                        <div class="col-4">
                            {{$i->quantity}}<br>
                        </div>
                    </div>
                    <hr>
                    @endif
                    @endforeach
                </div>
    </div> --}}
    @endforeach
    </tbody>
    </table>
</div>
{{-- <div class="content-delivery col-4" id="content-delivery">
    </div> --}}
</div>
@endsection

@section('script')
<script>
    $( ".collapse" ).appendTo( ".content-delivery");
</script>
@endsection