@extends('layouts.app')
@section('style')
<style>
    /* style */
</style>
@endsection

@section('content')
{{-- content --}}
<div class="row">
    <div class="col-4">
        <form id="form-to-from" action="{{route('reports.dates')}}" method="GET">
            @csrf
            <label for="">Buscar por data</label>
        <input type="date" name="startDate" value="{{Carbon\Carbon::now()}}">
        <input type="date" name="endDate" value = "{{now()}}">

            <a href="" onclick="event.preventDefault(); document.getElementById('form-to-from').submit();">
                <i class="fas fa-search"></i>
            </a>
        </form>

        <form action="{{route('reports.dates')}}" method="GET" id="form-month">
                @csrf
                <div class="form-group">
                        <label for="">Buscar por Mes</label>
              <select class="form-control" name="month" id="">
                <option>Selecione</option>
                @foreach ($months as $key => $value)
              <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
            <a href="" onclick="event.preventDefault(); document.getElementById('form-month').submit();"><i class="fas fa-search"></i>
            </a>
        </form>
    </div>
    <div class="col-8">
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
                    $total += $r->parcial_price;
                    @endphp
                    <td>{{$r->customer_name}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>{{number_format($r->parcial_price, 2)}}</td>
                    @endforeach
                </tr>
                @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                Vendas - {{number_format($total, 2)}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // script
</script>
@endsection