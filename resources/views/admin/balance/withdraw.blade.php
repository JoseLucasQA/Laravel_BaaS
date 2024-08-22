@extends('adminlte::page')

@section('title', 'Efetuar Saque')

@section('content_header')
<h1>Efetuar Saque</h1>

<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Saque</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        @include('admin.includes.alerts')
        <form method="post" action="{{ route('withdraw.confirm') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input name="value" type="text" placeholder="Exemplo: R$100,00" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@stop