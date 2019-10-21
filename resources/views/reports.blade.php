@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.css')}}">
@endsection
@section('style')
<style>
    /* style */

    .scrollable {
  height: 600px;
  overflow-y: scroll;
}

input{
    height: 40px!important;
}
</style>
@endsection

@section('content')
{{-- content --}}
<div class="row">
    <div class="col-3">
        <form id="form-to-from" action="{{route('reports.dates')}}" method="GET">
            {{-- @csrf --}}
            <label for="" class="">Pesquisa por data</label>
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="input-sm form-control" name="start" placeholder="Início" autocomplete="off"/>
                <span class="input-group-addon">-</span>
                <input type="text" class="input-sm form-control" name="end" placeholder="Fim" autocomplete="off"/>
            </div>
            
            <div class="row justify-content-end">
                <a href="" onclick="event.preventDefault(); document.getElementById('form-to-from').submit();">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </form>
            
            <form action="{{route('reports.dates')}}" method="GET" id="form-month">
                    {{-- @csrf --}}
                    <label for="" class="">Pesquisa por Mês</label>
                    <div class="form-group row">
                        <div class="col-10">
                            <select required class="form-control" name="month" id="">
                                <option value="">Selecione</option>
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

        @isset($dates)
        <div class="row fixed-bottom"
            style="background: #e9ecef; margin-left: 2px; padding-bottom: 20px; padding-top: 20px; font-size: 20px; color: green;">
            <div class="col-10">
                Vendas de <span style="color:lawngreen">{{$dates[0]}}</span> a <span style="color:lawngreen">{{$dates[1]}}</span> 
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
<script src="{{asset('vendor/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker-1.9.0-dist/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
<script>
    $('#datepicker').datepicker({
        format: "dd-mm-yyyy",
        language: "pt-BR",
        autoclose: true,
    });
</script>
@endsection