@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
<style>
    .login-box {
        width: 360px;
        margin: 7% auto;
    }

    .login-logo a {
        color: #6f42c1;
        /* Cor roxa para o logo */
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

    .form-control.rounded-input {
        border-radius: 8px;
        /* Bordas arredondadas para os inputs */
        border-color: #6f42c1;
        /* Borda roxa para os inputs */
    }

    .form-control:focus {
        border-color: #5a2d8b;
        /* Cor roxa escura ao focar no input */
        box-shadow: 0 0 0 0.2rem rgba(106, 27, 154, 0.25);
        /* Sombra roxa ao focar no input */
    }

    .btn-purple {
        /* Cor texto para o botão */
        color:#fff;
        background-color: #6f42c1;
        /* Cor roxa para o botão */
        border-color: #6f42c1;
        /* Cor da borda roxa para o botão */
        border-radius: 20px;
        /* Bordas arredondadas para o botão */
    }

    .btn-purple:hover {
        background-color: #5a2d8b;
        /* Cor roxa escura ao passar o mouse */
        border-color: #5a2d8b;
        /* Cor da borda roxa escura ao passar o mouse */
        border-radius: 20px;
        /* Bordas arredondadas para o botão */
    }

    .text-center a {
        color: #6f42c1;
        /* Cor roxa para links */
    }

    .text-center a:hover {
        color: #5a2d8b;
        /* Cor roxa escura para links ao passar o mouse */
    }

    /* Estilos para o icheck-bootstrap */
    .icheck-primary .icheckbox_square-purple {
        position: relative;
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 3px;
    }

    .icheck-primary .icheckbox_square-purple input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .icheck-primary .icheckbox_square-purple input:checked~.icheckbox_square {
        background: #6f42c1;
        /* Cor roxa para quando marcado */
        border-color: #6f42c1;
        /* Borda roxa quando marcado */
    }

    .icheck-primary .icheckbox_square-purple .icheckbox_square {
        border: 2px solid #6f42c1;
        /* Borda roxa para o checkbox */
        border-radius: 3px;
        /* Bordas arredondadas para o checkbox */
        background-color: #fff;
        /* Cor de fundo branca */
    }

    .icheck-primary .icheckbox_square-purple:hover .icheckbox_square {
        border-color: #5a2d8b;
        /* Cor da borda ao passar o mouse */
    }

    .icheck-primary .icheckbox_square-purple input:checked~.icheckbox_square::after {
        content: "";
        position: absolute;
        left: 5px;
        top: 2px;
        width: 8px;
        height: 13px;
        border: solid #fff;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
    }
</style>

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">
            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
        <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control rounded-input" value="{{ old('email') }}"
                    placeholder="{{ trans('adminlte::adminlte.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control rounded-input"
                    placeholder="{{ trans('adminlte::adminlte.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="icheck-primary">
                        <input type="checkbox" name="remember" id="remember" class="icheckbox_square-purple">
                        <label for="remember">{{ trans('adminlte::adminlte.remember_me') }}</label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-purple btn-block">
                        {{ trans('adminlte::adminlte.sign_in') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <br>
        <p class="text-center">
            <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}">
                {{ trans('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </p>
        @if (config('adminlte.register_url', 'register'))
        <p class="text-center">
            <a href="{{ url(config('adminlte.register_url', 'register')) }}">
                {{ trans('adminlte::adminlte.register_a_new_membership') }}
            </a>
        </p>
        @endif
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop

@section('adminlte_js')
@yield('js')
@stop