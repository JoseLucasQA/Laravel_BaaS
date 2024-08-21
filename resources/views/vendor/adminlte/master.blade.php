<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @include('adminlte::plugins', ['type' => 'css'])

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @yield('adminlte_css')

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
            background-color: #6f42c1;
            /* Cor roxa para o botão */
            border-color: #6f42c1;
            /* Cor da borda roxa para o botão */
            border-radius: 8px;
            /* Bordas arredondadas para o botão */
        }

        .btn-purple:hover {
            background-color: #5a2d8b;
            /* Cor roxa escura ao passar o mouse */
            border-color: #5a2d8b;
            /* Cor da borda roxa escura ao passar o mouse */
        }

        .text-center a {
            color: #6f42c1;
            /* Cor roxa para links */
        }

        .text-center a:hover {
            color: #5a2d8b;
            /* Cor roxa escura para links ao passar o mouse */
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition @yield('body_class')">

    @yield('body')

    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    @include('adminlte::plugins', ['type' => 'js'])

    @yield('adminlte_js')

</body>

</html>