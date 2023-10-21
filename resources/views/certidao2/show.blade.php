@extends('adminlte::page')

@section('title', 'Certidões 2 Via')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Visualizar Certidão</h1>
@stop

@section('content')
<div class="d-flex justify-content-start mb-3">
    <a href="{{ route('certidao2.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Voltar</a>
</div>

<div class="container border">
    <div class="row border">
      <div class="col-sm-8">col-sm-8</div>
      <div class="col-sm-4">col-sm-4</div>
    </div>
  </div>

@stop

@section('js')

@stop