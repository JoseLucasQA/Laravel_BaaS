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
        color: #f39c12;
        /* Cor laranja para o logo */
        font-weight: bold;
    }

    .login-box-body {
        border-radius: 12px;
        /* Bordas arredondadas para o container */
        border: 1px solid #f39c12;
        /* Borda laranja */
        background-color: #fff;
        /* Cor de fundo branca */
        padding: 20px;
    }

    .form-control.rounded-input {
        border-radius: 8px;
        /* Bordas arredondadas para os inputs */
        border-color: #f39c12;
        /* Borda laranja para os inputs */
    }

    .form-control:focus {
        border-color: #e67e22;
        /* Cor laranja escura ao focar no input */
        box-shadow: 0 0 0 0.2rem rgba(241, 153, 51, 0.25);
        /* Sombra laranja ao focar no input */
    }

    .btn-orange {
        background-color: #f39c12;
        /* Cor laranja para o botão */
        border-color: #f39c12;
        /* Cor da borda laranja para o botão */
        border-radius: 20px;
        /* Bordas arredondadas para o botão */
    }

    .btn-orange:hover {
        background-color: #e67e22;
        /* Cor laranja escura ao passar o mouse */
        border-color: #e67e22;
        /* Cor da borda laranja escura ao passar o mouse */
        border-radius: 20px;
        /* Bordas arredondadas para o botão */
    }

    .text-center a {
        color: #f39c12;
        /* Cor laranja para links */
    }

    .text-center a:hover {
        color: #e67e22;
        /* Cor laranja escura para links ao passar o mouse */
    }

    /* Estilos para o icheck-bootstrap */
    .icheck-primary .icheckbox_square-orange {
        position: relative;
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 3px;
    }

    .icheck-primary .icheckbox_square-orange input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .icheck-primary .icheckbox_square-orange input:checked~.icheckbox_square {
        background: #f39c12;
        /* Cor laranja para quando marcado */
        border-color: #f39c12;
        /* Borda laranja quando marcado */
    }

    .icheck-primary .icheckbox_square-orange .icheckbox_square {
        border: 2px solid #f39c12;
        /* Borda laranja para o checkbox */
        border-radius: 3px;
        /* Bordas arredondadas para o checkbox */
        background-color: #fff;
        /* Cor de fundo branca */
    }

    .icheck-primary .icheckbox_square-orange:hover .icheckbox_square {
        border-color: #e67e22;
        /* Cor da borda ao passar o mouse */
    }

    .icheck-primary .icheckbox_square-orange input:checked~.icheckbox_square::after {
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
                        <input type="checkbox" name="remember" id="remember" class="icheckbox_square-orange">
                        <label for="remember">{{ trans('adminlte::adminlte.remember_me') }}</label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-orange btn-block">
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