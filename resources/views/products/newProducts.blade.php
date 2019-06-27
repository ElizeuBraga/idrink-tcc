@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{route('newProduct.submit')}}">
        {{ csrf_field() }}
<input type="text" value="{{Auth::user()->id}}" name="user_id" required>
        <input type="text" name="name" required>
        <input type="text" name="price" required>
        <button type="submit">Salvar</button>
    </form>
</div>
@if (session('success'))
    <div>
        {{session('success')}}
    </div>
@endif
@if (session('error'))
    <div>
        {{session('error')}}
    </div>
@endif
@endsection