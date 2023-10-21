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
            <span class="info-box-text">Certidões</span>
            <span class="info-box-number"> {{$certidoes2}} </span>
        </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1">
            <i class="fas fa-users"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">Escreventes</span>
            <span class="info-box-number">{{$escreventes}}</span>
        </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Últimas Certidões Registradas</h3>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Matrpicula</th>
              <th>CPF</th>
              <th>Data/Hora do Registro</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ultimasCertidoes as $certidao)
            <tr>
                <td>
                  <a href="{{route('certidao2.show', $certidao->id )}}">{{$certidao->cer_nome_pessoa}}</a>
                </td>
                <td>{{$certidao->cer_matricula}}</td>
                <td>{{$certidao->cer_cpf}}</td>
                <td>{{$certidao->created_at->format('d/m/Y H:i')}}</td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer clearfix">
      <a href="{{route('certidao2.create')}}" class="btn btn-sm btn-info float-left"><i class="fa fa-plus"></i> Cadastrar Certidão</a>
      <a href="{{route('certidao2.index')}}" class="btn btn-sm btn-secondary float-right"><i class="fa fa-eye"></i> Ver todas</a>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop