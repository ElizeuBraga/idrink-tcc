@extends('layouts.app')
@section('style')
<style>
    /* style */

    .scrollable {
  height: 600px;
  overflow-y: scroll;
}
</style>
@endsection

@section('content')
{{-- content --}}
<div class="row">
    <div class="col-3">
        <form id="form-to-from" action="{{route('reports.dates')}}" method="GET">
            {{-- @csrf --}}

            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Inicio</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="startDate" value="Selecione">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Fim</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="endDate" value="">
                </div>
            </div>
            <div class="row justify-content-end">
                <a href="" onclick="event.preventDefault(); document.getElementById('form-to-from').submit();">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </form>

        <form action="{{route('reports.dates')}}" method="GET" id="form-month">
            {{-- @csrf --}}
            <div class="form-group row">
                <label for="" class="col-2 col-form-label">Mês</label>
                <div class="col-10">
                    <select class="form-control" name="month" id="">
                        <option>Selecione</option>
                        @foreach ($months as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row justify-content-end">
                <a href="" onclick="event.preventDefault(); document.getElementById('form-month').submit();"><i
                        class="fas fa-search"></i>
                </a>
            </div>
        </form>
        <div id="lava_div">
            @areachart('Deliveries', 'lava_div')
        </div>
    </div>
    <div class="col-9 scrollable">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Nome do cliente</th>
                    <th>Data</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp

                @if (count($report) == 0)
                <tr>
                    Nada a exibir
                </tr>
                @else
                @foreach ($report as $r)
                <tr>
                    @php
                    $total += $r->total_price;
                    @endphp
                    <td>{{$r->customer_name}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>{{number_format($r->total_price, 2)}}</td>
                    @endforeach
                </tr>
                @endif
            </tbody>
        </table>

        @isset($month)
        <div class="row fixed-bottom"
            style="background: #e9ecef; margin-left: 2px; padding-bottom: 20px; padding-top: 20px; font-size: 20px; color: green;">
            <div class="col-10">
                Vendas em {{$months[$month]}}
            </div>
            <div class="col-2">
                {{number_format($total, 2)}}
            </div>
        </div>
        @endisset
    </div>
</div>
@endsection

@section('script')
<script>
    // script
</script>
@endsection