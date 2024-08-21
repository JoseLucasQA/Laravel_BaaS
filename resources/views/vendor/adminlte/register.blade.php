@extends('adminlte::master')

@section('adminlte_css')
<style>
    /* Estilo para a página de registro */
    .register-box {
        width: 360px;
        margin: 7% auto;
        padding: 15px;
    }

    .register-logo a {
        color: #f39c12;
        /* Cor laranja para o texto do logo */
        font-size: 2.2em;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        display: block;
    }

    .register-box-body {
        background: #fff;
        /* Cor de fundo branca para a área do formulário */
        padding: 20px;
        border-radius: 12px;
        /* Bordas arredondadas para a área do formulário */
    }

    .register-box-body p {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        /* Cor do texto para contraste */
    }

    .form-control {
        border-radius: 8px;
        /* Bordas arredondadas para campos de entrada */
        border: 1px solid #ccc;
        /* Borda padrão */
        padding: 10px;
        font-size: 16px;
    }

    .form-control:focus {
        border-color: #f39c12;
        /* Borda laranja ao focar */
        box-shadow: 0 0 0 0.2rem rgba(241, 153, 51, 0.25);
        /* Sombra laranja ao focar */
    }

    .form-control-feedback {
        color: #f39c12;
        /* Cor laranja para ícones de feedback */
    }

    .has-error .form-control {
        border-color: #e74c3c;
        /* Borda vermelha para campos com erro */
    }

    .has-error .form-control-feedback {
        color: #e74c3c;
        /* Cor vermelha para ícones de erro */
    }

    .btn-primary {
        background-color: #f39c12;
        /* Cor laranja para o botão */
        border-color: #f39c12;
        /* Borda laranja para o botão */
        border-radius: 20px;
        /* Bordas arredondadas para o botão */
        padding: 10px;
    }

    .btn-primary:hover {
        background-color: #e67e22;
        /* Cor laranja escura ao passar o mouse */
        border-color: #e67e22;
        /* Borda laranja escura ao passar o mouse */
        border-radius: 20px;
    }

    .text-center {
        text-align: center;
        color: #333;
        /* Cor do texto dos links */
    }

    .text-center a {
        color: #f39c12;
        /* Cor laranja para o link */
    }

    .text-center a:hover {
        color: #e67e22;
        /* Cor laranja escura para o link ao passar o mouse */
    }
</style>
@yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
<div class="register-box">
    <div class="register-box-body">
        <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
        <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="{{ trans('adminlte::adminlte.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control"
                    placeholder="{{ trans('adminlte::adminlte.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                {{ trans('adminlte::adminlte.register') }}
            </button>
        </form>
        <br>
        <p class="text-center">
            <a href="{{ url(config('adminlte.login_url', 'login')) }}">
                {{ trans('adminlte::adminlte.i_already_have_a_membership') }}
            </a>
        </p>
    </div>
    <!-- /.register-box-body -->
</div><!-- /.register-box -->
@stop

@section('adminlte_js')
@yield('js')
@stop