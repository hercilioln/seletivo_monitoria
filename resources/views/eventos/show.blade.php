@extends('adminlte::page')

@section('title', 'Evento')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
<div class="d-flex justify-content-start mb-3">
    <a href="{{ route('eventos.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Voltar</a>
</div>

<div class="invoice p-3 mb-3">
  <div class="row">
     <div class="col-12">
        <h4>
           <i class="fas fa-globe"></i> {{$eventos->nome}}
        </h4>
     </div>
  </div>
  <div class="row invoice-info">
     <div class="col-sm-4 invoice-col">
        Descrição
        <address>
           <p>
            {{$eventos->descricao}}
           </p>
        </address>
     </div>
     <div class="col-sm-4 invoice-col">
        Datas
        <address>
           <strong>Data Inicial: </strong>{{\Carbon\Carbon::parse($eventos->data_inicial)->format('d/m/Y') }}<br>
           <strong>Data FInal: </strong>{{\Carbon\Carbon::parse($eventos->data_final)->format('d/m/Y') }}<br>
        </address>
     </div>
     <div class="col-sm-4 invoice-col">
      @if($eventos->arquivos)
          <p><strong>Edital:</strong></p>
          <p>
            <a href="{{ Storage::url($eventos->arquivos) }}" download class="btn btn-primary">
              <i class="fas fa-download"></i> Baixar Edital
          </a>
          </p>
      @endif
  </div>
  </div>
</div>
<div class="invoice p-3 mb-3">
  <div class="row">
     <div class="col-12">
        <h4>
          VAGAS
        </h4>
     </div>
  </div>
</div>

@stop

@section('js')

@stop