@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet"
    href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}}">
<style>
    /* Personalização para o layout do AdminLTE */
    .main-header {
        background-color: #6f42c1;
        /* Cor roxa para o cabeçalho */
        border-bottom: 2px solid #5a2d8b;
        /* Borda roxa escura */
    }

    .main-header .logo {
        background-color: #6f42c1;
        /* Cor roxa para o logo */
        border-bottom: 2px solid #5a2d8b;
        /* Borda roxa escura para o logo */
    }

    .main-header .logo-mini,
    .main-header .logo-lg {
        color: #fff;
        /* Cor branca para o texto do logo */
    }

    .main-header .navbar {
        background-color: #6f42c1;
        /* Cor roxa para a barra de navegação */
    }

    .main-header .navbar .nav>li>a {
        color: #fff;
        /* Cor branca para links na barra de navegação */
    }

    .main-header .navbar .nav>li>a:hover {
        background-color: #5a2d8b;
        /* Cor roxa escura ao passar o mouse */
    }

    .main-sidebar {
        background-color: #fff;
        /* Cor de fundo branca para a barra lateral */
        border-right: 2px solid #6f42c1;
        /* Borda roxa direita para a barra lateral */
    }

    .sidebar-menu>li>a {
        border-radius: 8px;
        /* Bordas arredondadas para itens do menu */
        color: #333;
        /* Cor padrão para itens do menu */
    }

    .sidebar-menu>li>a:hover {
        background-color: #6f42c1;
        /* Cor roxa ao passar o mouse sobre itens do menu */
        color: #fff;
        /* Cor branca para o texto ao passar o mouse */
    }

    .content-wrapper {
        background-color: #f4f4f4;
        /* Cor de fundo leve para o conteúdo */
    }

    .main-footer {
        background-color: #6f42c1;
        /* Cor roxa para o rodapé */
        color: #fff;
        /* Cor branca para o texto do rodapé */
    }

    .main-footer a {
        color: #fff;
        /* Cor branca para links no rodapé */
    }

    .main-footer a:hover {
        color: #5a2d8b;
        /* Cor roxa escura para links no rodapé ao passar o mouse */
    }

    /* Personalização para os botões */
    .btn-primary,
    .btn-primary:hover {
        background-color: #605ca8;
        /* Cor roxa para botões */
        border-color: #6f42c1;
        /* Cor roxa para a borda do botão */
    }

    .btn-primary:focus,
    .btn-primary:active {
        box-shadow: 0 0 0 0.2rem rgba(106, 27, 154, 0.25);
        /* Sombra roxa ao focar no botão */
    }

    /* Estilo do checkbox para cor roxa */
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
@stack('css')
@yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
'boxed' => 'layout-boxed',
'fixed' => 'fixed',
'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        @if(config('adminlte.layout') == 'top-nav')
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                @else
                <!-- Logo -->
                <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>A</b>LT') !!}</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle fa5" data-toggle="push-menu" role="button">
                        <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                    </a>
                    @endif
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">
                            <li>
                                @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                    </a>
                                    @else
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                    </a>
                                    <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                        @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                        @endif
                                        {{ csrf_field() }}
                                    </form>
                                    @endif
                            </li>
                            @if(config('adminlte.right_sidebar') and (config('adminlte.layout') != 'top-nav'))
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar" @if(!config('adminlte.right_sidebar_slide')) data-controlsidebar-slide="false" @endif>
                                    <i class="{{config('adminlte.right_sidebar_icon')}}"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @if(config('adminlte.layout') == 'top-nav')
            </div>
            @endif
        </nav>
    </header>

    @if(config('adminlte.layout') != 'top-nav')
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if(config('adminlte.layout') == 'top-nav')
        <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
        </div>
        <!-- /.container -->
        @endif
    </div>
    <!-- /.content-wrapper -->

    @hasSection('footer')
    <footer class="main-footer">
        @yield('footer')
    </footer>
    @endif

    @if(config('adminlte.right_sidebar') and (config('adminlte.layout') != 'top-nav'))
    <aside class="control-sidebar control-sidebar-{{config('adminlte.right_sidebar_theme')}}">
        @yield('right-sidebar')
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    @endif

</div>
<!-- ./wrapper -->
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@stack('js')
@yield('js')
@stop