@extends('adminlte::page')

@section('title', 'Extrato')

@section('content_header')
<h1>Extrato</h1>

<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Extrato</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Remetente/Destinatário</th>
                </tr>
            </thead>
            <tbody>
                @forelse($historics as $historic)
                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ number_format($historic->amount, 2, ',', '.') }}</td>
                        <td>{{ $historic->type }}</td>
                        <td>{{ $historic->date }}</td>
                        <td>{{ $historic->name }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop