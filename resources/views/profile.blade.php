@extends('layouts.app')
@section('style')
<style>
    /* style */
</style>
@endsection

@section('content')
    {{-- content --}}
<img src="/images/avatar/{{$user->avatar}}" class="avatar" alt="">
<form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Mudar imagem do perfil</label>
    <input type="file" name="avatar">
    <label for="">Nome</label>
    <input type="text" name="name" value="{{$user->name}}">
    <label for="">Telefone</label>
    <input type="text" name="phone" value="{{$user->phone}}">
    <input type="submit" value="Enviar">
</form>
<h2>{{$user->name}}</h2>
@endsection

@section('script')
<script>
    // script
</script>
@endsection
