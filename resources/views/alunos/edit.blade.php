@extends('adminlte::page')

@section('title', 'Eventos')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Editar Eventos</h3>
    </div>
        <form action="{{route('eventos.update', $eventos->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('eventos.form')
        </form>
    </div>
@stop

@section('js')
    <script src="{{ asset('DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables-ptbr.json') }}"></script>
@stop