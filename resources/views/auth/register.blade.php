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
                    <div id="phone" class="wrap-input100 validate-input" data-validate = "Telefone para contato">
                        <input id="fieldphone" class="input100" type="text" name="phone" placeholder="Telefone" value="{{ old('phone') }}">
                        <span class="focus-input100"></span>
                        @if ($errors->has('phone'))
                        <p hidden id="errphone" value="">{{$errors->first('phone')}}</p>
                        @endif
                        <span class="symbol-input100">
                            <i class="fas fa-phone"></i>
                        </span>
                    </div>
                    <div id="cnpj" class="wrap-input100 validate-input" data-validate = "CNPJ válido">
                        <input id="fieldcnpj" class="input100" type="text" name="cnpj" placeholder="CNPJ" value="{{ old('cnpj') }}">
                    <span class="focus-input100"></span>
                    @if ($errors->has('cnpj'))
                    <p hidden id="errcnpj" value="">{{$errors->first('cnpj')}}</p>
                    @endif
                    <span class="symbol-input100">
                        <i class="fas fa-user-edit"></i>
                    </span>
                </div>
                <div id="password" class="wrap-input100 validate-input" data-validate = "Digite uma senha">
                    <input class="input100" type="password" name="password" placeholder="Senha">
                    <span class="focus-input100"></span>
                    @if ($errors->has('password'))
                    <p hidden id="errpassword" value="">{{$errors->first('password')}}</p>
                    @endif
                    <span class="symbol-input100">
                        <i class="fas fa-unlock-alt"></i>
                    </span>
                </div>

                <div id="password_confirm" class="wrap-input100 validate-input" data-validate = "Confirme a senha">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirme a senha">
                    <span class="focus-input100"></span>
                    @if ($errors->has('password_confirm'))
                    <p hidden id="errpassword" value="">{{$errors->first('password_confirmation')}}</p>
                    @endif
                    <span class="symbol-input100">
                        <i class="fas fa-unlock-alt"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Cadastrar
                    </button>
                </div>

                <div class="text-center p-t-136">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" type="text/javascript"></script>
    <script>
            $("#fieldcnpj").mask("99.999.999/9999-99");
            $("#fieldphone").mask("(99)9999-9999");
            if($("#erremail").length != 0 ){
                let erremail = document.getElementById('erremail').innerHTML;
                let element = document.getElementById('email');                
                element.dataset.validate = erremail;
                element.classList.add('alert-validate');
            }

            else if($("#errpassword").length != 0 ){
                let errpassword = document.getElementById('errpassword').innerHTML;
                let element = document.getElementById('password');                
                element.dataset.validate = errpassword;
                element.classList.add('alert-validate');
            }

            else if($("#errcnpj").length != 0 ){
                let errcnpj = document.getElementById('errcnpj').innerHTML;
                let element = document.getElementById('cnpj');                
                element.dataset.validate = errcnpj;
                element.classList.add('alert-validate');
            }

            else if($("#errphone").length != 0 ){
                alert('Oi');
                let errphone = document.getElementById('errphone').innerHTML;
                let element = document.getElementById('phone');                
                element.dataset.validate = errphone;
                element.classList.add('alert-validate');
            }
            // var errcnpj = document.getElementById('errcnpj').innerHTML;
            // var errpassword = document.getElementById('errpassword').innerHTML;
            // var errpasswordconfirm = document.getElementById('errpasswordconfirm').innerHTML;
            // var element1 = document.getElementById('password');
            // var element2 = document.getElementById('cnpj');
            // var element3 = document.getElementById('password_confirm');
            // element2.dataset.validate = errcnpj;
            // element1.dataset.validate = errpassword;
            // element1.classList.add('alert-validate');
            // element2.classList.add('alert-validate');
            // element3.classList.add('alert-validate');
    </script>
@endsection