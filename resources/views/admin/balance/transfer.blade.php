@extends('adminlte::page')

@section('title', 'Efetuar Transferência')

@section('content_header')
<h1>Efetuar Transferência</h1>

<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Transferir</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        @include('admin.includes.alerts')
        <form method="post" action="{{ route('transfer.receiver') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input name="sender" type="text" placeholder="Dados do destinatário (Nome ou Email)"
                    class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Avançar</button>
            </div>
        </form>
    </div>
</div>
@stop