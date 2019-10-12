@extends('layouts.app')
@section('style')
<style>
    /* style */
    .avatar-profile {
        height: 250px;
        width: 250px;
    }
</style>
@endsection

@section('content')
{{-- content --}}
<div class="row">
    <div class="col-md-4">

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

    <div class="col-md-4">
        <h2>Busca cep</h2>
        <form action="{{route('adresses.create')}}" method="GET">
            @csrf
            <div class="wrap-input100">

            <input class="input100" type="text" name="cep" id="">
        </div>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="col-md-4">

        @isset($cepArray)
        <h2>Endereço</h2>
        <form action="{{route('adresses.store')}}" method="POST">
                @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
            @csrf
            <input type="hidden" name="user_id"  id="" value="{{$user->id}}" readonly>
            <input type="hidden" name="cep" id="" value="{{$cepArray['cep']}}" readonly>

                <input type="text" name="logradouro" class="input100" id="" value="{{$cepArray['logradouro']}}" readonly>
            <input type="text" name="bairro" id="" value="{{$cepArray['bairro']}}" readonly>
            <input type="text" name="localidade" id="" value="{{$cepArray['localidade']}}" readonly>
            <input type="text" name="uf" id="" value="{{$cepArray['uf']}}" readonly>
            <input type="text" name="numero" id="">
            <input type="text" name="complemento" id="" value="{{$cepArray['complemento']}}">
            <input type="submit" value="Salvar">
        </form>
        @endisset
    </div>
</div>
<div>
    <h3>Enderecos</h3>
    @php
    $i = 1;
    @endphp
    @foreach ($adressUser as $aU)
    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Endereco - {{$i}}</h4>
            <p>{{$aU->cep}}</p>
            <p>{{$aU->cidade}}</p>
            <p>{{$aU->bairo}}</p>
            <p>{{$aU->logradouro}}</p>
            <p>{{$aU->complemento}}</p>
            <p>{{$aU->numero}}</p>
            @php
            $i++;
            @endphp
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('script')
<script>
    // script
</script>
@endsection
