@extends('adminlte::page')

@section('title', 'Efetuar Transferência')

@section('content_header')
<h1>Confirmar Transferência</h1>

<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Transferir</a></li>
    <li><a href="">Confirmar</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        @include('admin.includes.alerts')

        <p>
            <strong>
                Destinatário: {{ $sender->name }}
            </strong>
        </p>
        <p>
            <strong>
                Saldo R$: {{ number_format($balance->amount, '2', ',', '.') }}
            </strong>
        </p>

        <form method="post" action="{{ route('transfer.confirm') }}">
            {!! csrf_field() !!}

            <input type="hidden" name="sender_id" value="{{ $sender->id }}">

            <div class="form-group">
                <input name="value" type="text" placeholder="Valor: R$ 0,00" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@stop