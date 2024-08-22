@extends('adminlte::page')

@section('title', 'Efetuar Depósito')

@section('content_header')
<h1>Efetuar Depósito</h1>

<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Depósito</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        <form method="post" action="{{ route('deposit.confirm') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input name="value" type="text" placeholder="R$ 0,00" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@stop