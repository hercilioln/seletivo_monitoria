@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box">
        <span class="info-box-icon bg-info elevation-1">
            <i class="fas fa-file-alt"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">Eventos</span>
            <span class="info-box-number"> {{$eventos}} </span>
        </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop