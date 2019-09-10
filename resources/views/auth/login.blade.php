@extends('layouts.forms')
@section('pageTitle', 'Login')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

        <form class="login100-form validate-form" action="{{route('login')}}" method="POST">
            @csrf
                <span class="login100-form-title">
                    Login de usuario 
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

                <div id="divPassword" class="wrap-input100 validate-input" data-validate = "Digite a senha">
                    <input class="input100" type="password" name="password" placeholder="Senha">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
                <br>
                <div  class="wrap-input100" data-validate = "Digite a senha">
                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="">Lembrar de mim</label>
                    <span class="focus-input100"></span>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Esqueceu
                    </span>
                <a class="txt2" href="{{route('password.request')}}">
                        Email / Senha?
                    </a>
                </div>

                <div class="text-center p-t-136">
                <a class="txt2" href="{{route('register')}}">
                        Cadastre-se
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
                let element2 = document.getElementById('divPassword');                
                element.dataset.validate = errValidate;
                element2.dataset.validate = errValidate;
                element.classList.add('alert-validate');
                element2.classList.add('alert-validate');
            }
    </script>
@endsection