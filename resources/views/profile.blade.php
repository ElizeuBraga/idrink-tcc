@extends('layouts.app')
@section('style')
<style>
    /* style */
    .avatar-profile{
        height: 250px;
        width: 250px;
    }
</style>
@endsection

@section('content')
    {{-- content --}}
<div class="row">
    <img src="/images/avatar/{{$user->avatar}}" class="avatar avatar-profile" alt="">
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

<form action="{{route('adresses.create')}}" method="GET">
@csrf
<input type="text" name="cep" id="">
<button type="submit">Enviar</button>
</form>

@isset($cepArray)
<form action="{{route('adresses.store')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" id="" value="{{$user->id}}" readonly>
        <input type="hidden" name="cep" id="" value="{{$cepArray['cep']}}" readonly>
        <input type="text" name="logradouro" id="" value="{{$cepArray['logradouro']}}" readonly>
        <input type="text" name="bairro" id="" value="{{$cepArray['bairro']}}" readonly>
        <input type="text" name="localidade" id="" value="{{$cepArray['localidade']}}" readonly>
        <input type="text" name="uf" id="" value="{{$cepArray['uf']}}" readonly>
        <input type="text" name="numero" id="">
        <input type="text" name="complemento" id="" value="{{$cepArray['complemento']}}">
        <button type="submit">Enviar</button>
    </form>
    @endisset
</div>
@endsection

@section('script')
<script>
    // script
</script>
@endsection
