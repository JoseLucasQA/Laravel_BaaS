@extends('adminlte::master')

@section('adminlte_css')
<style>
    /* Estilo para a página de login */
    .login-box {
        width: 360px;
        margin: 7% auto;
    }

    .login-logo a {
        color: #6f42c1;
        /* Cor roxa para o texto do logo */
        font-weight: bold;
    }

    .login-box-body {
        border-radius: 12px;
        /* Bordas arredondadas para o container */
        border: 1px solid #6f42c1;
        /* Borda roxa */
        background-color: #fff;
        /* Cor de fundo branca */
        padding: 20px;
    }

    .form-control {
        border-radius: 8px;
        /* Bordas arredondadas para os inputs */
        border-color: #6f42c1;
        /* Borda roxa para os inputs */
    }

    .form-control:focus {
        border-color: #5a2d8b;
        /* Cor roxa escura ao focar no input */
        box-shadow: 0 0 0 0.2rem rgba(90, 43, 139, 0.25);
        /* Sombra roxa ao focar no input */
    }

    .form-control-feedback {
        color: #6f42c1;
        /* Cor roxa para ícones de feedback */
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
        background-color: #6f42c1;
        /* Cor roxa para o botão */
        border-color: #6f42c1;
        /* Borda roxa para o botão */
        border-radius: 20px;
        /* Bordas arredondadas para o botão */
    }

    .btn-primary:hover {
        background-color: #5a2d8b;
        /* Cor roxa escura ao passar o mouse */
        border-color: #5a2d8b;
        /* Borda roxa escura ao passar o mouse */
    }

    .text-center {
        text-align: center;
        color: #333;
        /* Cor do texto dos links */
    }

    .text-center a {
        color: #6f42c1;
        /* Cor roxa para o link */
    }

    .text-center a:hover {
        color: #5a2d8b;
        /* Cor roxa escura para o link ao passar o mouse */
    }
</style>
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{ trans('adminlte::adminlte.password_reset_message') }}</p>
        <form action="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ isset($email) ? $email : old('email') }}"
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
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                {{ trans('adminlte::adminlte.reset_password') }}
            </button>
        </form>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop

@section('adminlte_js')
@yield('js')
@stop