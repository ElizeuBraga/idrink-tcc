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
</div>
@endsection

@section('script')
<script>
    // script
</script>
@endsection
