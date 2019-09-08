@extends('layouts.forms')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-03.png" alt="IMG">
            </div>
            
            <form class="login100-form validate-form" action="{{route('register')}}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Cadastro de loja
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Nome da loja">
                        <input class="input100" type="text" name="name" placeholder="Nome da loja" value="{{ old('name') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fas fa-user-edit"></i>
                        </span>
                    </div>
                    <div id="email" class="wrap-input100 validate-input" data-validate = "Digite um email válido">
                        <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        @if ($errors->has('email'))
                        <p hidden id="erremail" value="">{{$errors->first('email')}}</p>
                        @endif
                        <span class="symbol-input100">
                            <i class="fas fa-map-marked-alt"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Telefone para contato">
                        <input class="input100" type="text" name="phone" placeholder="Telefone" value="{{ old('phone') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fas fa-phone"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "CNPJ válido">
                        <input class="input100" type="text" name="cnpj" placeholder="CNPJ" value="{{ old('cnpj') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fas fa-user-edit"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Digite uma senha">
                    <input class="input100" type="password" name="password" placeholder="Senha">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fas fa-unlock-alt"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Confirme a senha">
                    <input class="input100" type="password" name="password_confirm" placeholder="Confirme a senha">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fas fa-unlock-alt"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Cadastrar
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Esqueceu
                    </span>
                    <a class="txt2" href="#">
                        Email / Senha?
                    </a>
                </div>

                <div class="text-center p-t-136">
                <a class="txt2" href="{{route('login')}}">
                        Entrar
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>

                @if ($errors->has('name'))
                <span>{{$errors->first('name')}}</span>
                @endif
                
                @if ($errors->has('cnpj'))
                <span>{{$errors->first('cnpj')}}</span>
                @endif
                @if ($errors->has('password'))
                <span value="{{$errors->first('passwprd')}}"></span>
                @endif
                @if ($errors->has('phone'))
                <span>{{$errors->first('phone')}}</span>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
            var erremail = document.getElementById('erremail').innerHTML;
            var element = document.getElementById('email');
            element.dataset.validate = erremail;
            element.classList.add('alert-validate')

            console.log(element);
            
    </script>
@endsection