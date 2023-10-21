@extends('adminlte::page')

@section('title', 'Certidões 2 Via')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Certidões 2ª Via</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cadastrar 2ª Via de Certidão</h3>
    </div>
        <form action="{{route('certidao2.store')}}" method="POST">
            @csrf
            @include('certidao2.form')
        </form>
    </div>
@stop

@section('js')
    <script src="{{ asset('DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables-ptbr.json') }}"></script>
@stop