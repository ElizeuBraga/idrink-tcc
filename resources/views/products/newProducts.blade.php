@extends('layouts.app')
@section('content')
<div class="container" style="align-content:center">
    <div class="card" style="width: 400px; margin:0 auto">
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif

        <form method="POST" action="{{route('newProduct.submit')}}">
                {{ csrf_field() }}
            <label for="">Nome do produto</label>
            <input class="form-control" type="hidden" value="{{Auth::user()->id}}" name="user_id" required>

            <label for=""></label>
            <input class="form-control" type="text" name="name" required>
            
            <label for="">Valor</label>
            <input class="dinheiro form-control" type="text" name="price" required>
            <br>
            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</div>
@endsection