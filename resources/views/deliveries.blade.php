@extends('layouts.app')
@section('style')
<style>
    /* style */

    .fa-times-circle,
    .fa-motorcycle,
    .fa-search {
        margin-left: 5%;
        font-size: 18px;
    }
</style>
@endsection

@section('content')
{{-- content --}}
<div class="row">
    <div class="col-12">
        @if(Session::has('success'))
        <p class="alert alert-success text-center">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('warning'))
        <p class="alert alert-warning text-center">{{ Session::get('warning') }}</p>
        @endif
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
                <form id="update-form-delivered{{$d->id}}" action="{{route('deliveries.update', $d->id)}}" ,
                    method="POST">
                    <input type="hidden" value="delivered" name="status">
                    @method('PUT')
                    @csrf
                </form>
                <form id="update-form-canceled{{$d->id}}" action="{{route('deliveries.update', $d->id)}}" ,
                    method="POST">
                    <input type="hidden" value="canceled" name="status">
                    @method('PUT')
                    @csrf
                </form>
                <tr class="{{$d->status == 'canceled' ? 'text-danger' : ''}}">
                    {{-- <td scope="row"></td> --}}
                    <td>{{$d->id}}</td>
                    <td>{{$d->customer_name}}</td>
                    <td>{{$d->logradouro}}</td>
                    @if ($d->payment == 'money')
                    <td class=""><i class="fas fa-money-bill-wave" style="color: green;"></i> -
                        {{number_format($d->change, 2)}}</td>
                    @elseif($d->payment == 'credit')
                    <td class=""><i class="far fa-credit-card" style="color: blue;"></i></td>
                    @else
                    <td class=""><i class="far fa-credit-card" style="color: orange;"></i></td>
                    @endif
                    <td>
                        <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg{{$d->id}}">
                            <i class="fas fa-search" title="Visualizar pedido"></i>
                        </a>
                        <a href="{{route('deliveries.update', $d->id)}}">
                            <i class="fas fa-motorcycle {{$d->status == 'delivered' ? 'fa-spin' : ''}}"
                                style="color: green;" title="{{$d->status == 'delivered' ? 'A caminho' : 'Despachar'}}"
                                onclick="event.preventDefault(); document.getElementById('update-form-delivered{{$d->id}}').submit();"></i>
                        </a>
                        <a href="{{route('deliveries.update', $d->id)}}">
                            <i class="fas fa-times-circle" style="color: red;"
                                title="{{$d->status == 'canceled' ? 'Cancelado' : 'Cancelar'}}"
                                onclick="event.preventDefault(); document.getElementById('update-form-canceled{{$d->id}}').submit();"></i>
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