@extends('layouts.app')
@section('style')
    <style>
        .btn{
            min-width: 25px!important;
            height: 28px!important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Região</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="delivery in deliveries" v-on:click = "carregaItems(delivery.id)">
                        <td>@{{delivery.customer_name}}</td>

                        <td>@{{delivery.localidade}}</td>
                        <td>@{{delivery.total_price}}</td>
                        <td>@{{delivery.status}}</td>
                        <td>
                            <button class="btn" v-on:click = "carregaItems(delivery.id)">
                                <i class="far fa-eye" style="color: blue"></i>
                            </button>
                            <button class="btn" v-on:click = "update(delivery.id, 'delivered')">
                                    <i class="far fa-arrow-alt-circle-right" style="color: green"></i>
                            </button>
                            <button class="btn" v-on:click = "update(delivery.id, 'canceled')">
                                    <i class="fas fa-window-close" style="color: red"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4 scrollable" style="border: solid 1px; border-color: tan">
            <div v-if="itemss.length > 0" class="row justify-content-center">
                <b>@{{itemss[0].customer_name}}</b>
            </div>
            <div class="row" style="color: black; background: orange;">
                <div class="col-6">Produto</div>
                <div class="col-2">Qtd</div>
                <div class="col-4">Valor parcial</div>
            </div>
            <div v-for = "item in itemss" class="row">
                <div  class="col-6">
                    @{{item.product_name}}
                </div>
                <div  class="col-2">
                    @{{item.quantity}}
                </div>
                <div  class="col-4">
                    @{{item.parcial_price.toFixed(2)}}
                </div>
            </div>
            <div v-if="itemss.length > 0" class="row" style="font-weight: bold; color: green; background: orange;">
                <div class="col-6">
                    Valor da compra
                </div>
                <div class="col-2"></div>
                <div class="col-4">
                    @{{itemss[0].total_price.toFixed(2)}}
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var host = window.location.hostname;
    var items = {!!json_encode($items)!!};
    var deliveries = {!!json_encode($deliveries)!!};
</script>