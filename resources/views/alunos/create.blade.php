@extends('adminlte::pageblank')

@section('title', 'Aluno')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Aluno</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cadastro de Auno</h3>
    </div>
        <form action="{{route('alunos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('alunos.form')
        </form>
    </div>
</div>
@stop

@section('js')
    <script src="{{ asset('DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables-ptbr.json') }}"></script>
@stop