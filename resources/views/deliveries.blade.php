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

<table class="table table-striped table-inverse table-responsive">
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
        <div class="row">

            @foreach ($deliveries as $d)
            <tr class="col-10">
                {{-- <td scope="row"></td> --}}
                <td>{{$d->id}}</td>
                <td>{{$d->store_name}}</td>
                <td>{{$d->customer_name}}</td>
                <td>{{$d->payment}}</td>
                <td>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample{{$d->id}}" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        Ver items
                    </a>
                </td>
            </tr>
            <div class="collapse col-2" id="collapseExample{{$d->id}}">
                <div class="card card-body">
                    @foreach ($items as $i)
                    @if ($d->id == $i->delivery_id)
                    Items-{{$i->delivery_id}}-{{$i->product_name}} - {{$i->quantity}}<br>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection

@section('script')
<script>
    // script
</script>
@endsection