@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Carteira Digital</a></li>
</ol>

<h1>Saldo</h1>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        @include('admin.includes.alerts')
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>R$ {{number_format($amount, 2, ',', '.')}}</h3>
            </div>
        </div>
        <a href="{{ route('balance.deposit') }}" class="btn btn-primary">Depositar <i
                class="fa-solid fa-sack-dollar"></i></a>
        @if ($amount > 0)
            <a href="{{ route('balance.withdraw') }}" class="btn btn-primary">Sacar <i
                    class="fa-solid fa-hand-holding-dollar"></i></a>
            <a href="{{ route('balance.transfer') }}" class="btn btn-primary">Transferir <i
                    class="fa-solid fa-money-bill-transfer"></i></a>
        @endif
    </div>
</div>
</div>
@stop