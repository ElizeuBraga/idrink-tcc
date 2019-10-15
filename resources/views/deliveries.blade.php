@extends('layouts.app')
@section('style')
<style>
    /* style */
</style>
@endsection

@section('content')
{{-- content --}}
<h1>Deliveries</h1>
{{-- {{dd($deliveries)}} --}}
{{-- {{dd($items)}} --}}
<div class="row">
    <div class="col-8">
        <table class="table">
            <thead class="thead-inverse">
                <tr>
                    <th>Id</th>
                    <th>Loja</th>
                    <th>Cliente</th>
                    <th>Pagamento</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveries as $d)
                <tr class="">
                    {{-- <td scope="row"></td> --}}
                    <td>{{$d->id}}</td>
                    <td>{{$d->store_name}}</td>
                    <td>{{$d->customer_name}}</td>
                    <td>{{$d->payment}}</td>
                    <td>
                        <a class="btn btn-primary bt" data-toggle="collapse" href="#collapseExample{{$d->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Ver items
                        </a>
                    </td>
                </tr>
                <div class="collapse" style="" id="collapseExample{{$d->id}}">
                    <div class="">
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
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="content-delivery col-4" id="content-delivery">
    </div>
</div>
@endsection

@section('script')
<script>
    $( ".collapse" ).appendTo( ".content-delivery");
</script>
@endsection