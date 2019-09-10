@extends('layouts.formsReset')
@section('pageTitle', 'Recuperar senha')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="../images/img-04.png" alt="imagem">
            </div>

        <form class="login100-form validate-form" action="{{route('password.email')}}" method="POST">
            @csrf
                <span class="login100-form-title">
                    Recuperar senha
                </span>

                <div id="divEmail" class="wrap-input100 validate-input" data-validate = "Digite um email valido: ex@abc.xyz">
                    <input id="" class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    @if ($errors->has('email'))
                    <p hidden id="errValidate" value="">{{$errors->first('email')}}</p>
                    @endif
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Enviar
                    </button>
                </div>
                <br>
            
                <div class="text-center p-t-136">
                <a class="txt2" href="{{route('register')}}">
                    Cadastre-se
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a><br>
                <a class="txt2" href="{{route('login')}}">
                    Entrar
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        if($("#errValidate").length != 0 ){
                let errValidate = document.getElementById('errValidate').innerHTML;
                let element = document.getElementById('divEmail');                
                element.dataset.validate = errValidate;
                element.classList.add('alert-validate');
            }
    </script>
@endsection