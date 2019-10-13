@extends('layouts.app')
@section('style')
<style>
    /* style */
    .avatar-profile {
        height: 250px;
        width: 250px;
    }

    input[type='text'] {
        border-radius: 0;
        margin: 4px;
    }

    input[type='text']:focus {
        border-color: orange;
    }

    ::placeholder {
        color: red !important;
        opacity: 1;
    }

    .card {
        height: 98%;
        border-color: orange;
        margin-top: 1%;
    }

    .jumbotron {
        font-size: 15px;
    }
</style>
@endsection

@section('content')
{{-- content --}}
{{-- card avatar --}}
<div class="row">
    <div class="col-4">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="card-title">Perfil</h4>
                <img class="" src="/images/avatar/{{$user->avatar}}" alt="">
                <h4 class="card-title">{{$user->name}}</h4>
                <span>{{$user->phone}}</span><br>
                <span>{{$user->email}}</span><br>
                <input type="button" value="Editar" data-target="#editProfile" data-toggle="modal">
            </div>
        </div>
    </div>

    {{-- Modal edit profile--}}
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModal">Editar</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input class="form-control" type="file" name="avatar" id="inputAvatar">
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}">
                            <input type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- card cep --}}
    <div class="col-4">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="card-title">Busca cep</h4>
                <form action="{{route('adresses.getcep')}}" method="POST">
                    {{-- @method('POST') --}}
                    @csrf
                    <div class="wrap-input100">
                        <input class="input100" type="text" data-mask="00000-015" placeholder="Digite seu CEP"
                            name="cep" id="inputCep" required minlength="8">
                        <small id="emailHelp" class="form-text text-muted">Para adicionar um novo endereço digite o
                            CEP</small>
                    </div>
                    <input type="submit" value="Buscar">
                </form>

                <div class="jumbotron text-justify">
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @foreach ($adressUser as $aU)
                    <form action="{{route('adresses.update', $aU->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="status" value="0">
                        <b>CEP:</b> {{$aU->cep}}<br>
                        <b>UF:</b> {{$aU->uf}}<br>
                        <b>Cidade:</b> {{$aU->localidade}}<br>
                        <b>Bairro:</b> {{$aU->bairro}}<br>
                        <b>Logradouro:</b> {{$aU->logradouro}}<br>
                        <b>Complemeto:</b> {{$aU->complemento}}<br>
                        <b>Numero:</b> {{$aU->numero}}<br>
                        <input type="submit" value="Excluir">
                    </form>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- card Endereco --}}
    @if(session()->has('cepArray'))
    <div class="col-4">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="card-title">Endereço</h4>
                <form action="{{route('adresses.store')}}" method="POST">
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @csrf
                    <input type="hidden" name="user_id" id="" value="{{$user->id}}" readonly>
                    <input type="hidden" name="cep" id="" value="{{Session::get('cepArray.cep')}}" readonly>
                    <input type="text" name="uf" id="" value="{{Session::get('cepArray.uf')}}" readonly>
                    <input type="text" name="localidade" id="" value="{{Session::get('cepArray.localidade')}}" readonly>

                    <input type="text" name="logradouro" class="input100" id=""
                        value="{{Session::get('cepArray.logradouro')}}" readonly>
                    <input type="text" name="bairro" id="" value="{{Session::get('cepArray.bairro')}}" readonly>
                    <input type="text" name="complemento" placeholder="Complemento" id="" required>
                    <input type="text" name="numero" placeholder="Numero" id="" required>
                    <input type="submit" value="Salvar">
                </form>
            </div>
        </div>
    </div>
    @endisset
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
         $('#inputCep').mask("00000-000");
    });

    $('#editProfile').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
    });
</script>
@endsection
