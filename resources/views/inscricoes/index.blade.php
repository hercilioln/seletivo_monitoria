@extends('adminlte::page')

@section('title', 'Inscrições')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Inscrições</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Inscrições</h3>
    </div>
    <div class="card-body">
      <div class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <table id="example" class="table table-bordered hover dataTable dtr-inline" aria-describedby="example1_info">
              <thead>
                <tr>
                  <th class="sorting sorting_asc" tabindex="0">Aluno</th>
                  <th class="sorting sorting_asc" tabindex="0">Histórico</th>
                  <th class="sorting" tabindex="0">Vaga</th>
                  <th class="sorting" tabindex="0">Edital</th>
                  <th class="sorting" tabindex="0">Status</th>
                  <th class="sorting" tabindex="0">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($inscricoes as $items )
                <tr class="odd">
                  <td>{{$items->aluno->user->name}}</td>
                  <td>
                    <a href="{{ asset('storage/' . $items->aluno->historico) }}" class="btn btn-primary btn-sm" download>
                        <i class="fa fa-download"></i> Baixar Histórico
                    </a>
                  </td>
                  <td>{{$items->vaga->disciplina->nome}}</td>
                  <td>{{$items->vaga->evento->nome}}</td>
                  <td class="{{ $items->status === 'pendente' ? 'btn-warning' : ($items->status === 'aprovado' ? 'btn-success' : 'btn-danger') }}">
                    {{ $items->status === 'pendente' ? 'Pendente' : ($items->status === 'aprovado' ? 'Aprovado' : 'Reprovado') }}
                </td>
                  <td class="text-right align-middle">
                    <!-- Botão de editar -->
                    <a href="{{ route('inscricoes.edit', $items->id) }}" class="btn btn-sm btn-warning mr-2"><i class="fa fa-edit"></i> Editar</a>
                    <!-- Botão de excluir -->
    
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('js')
    <script src="{{ asset('DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables-ptbr.json') }}"></script>
    <script src=""></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
            language: {
                url: "{{ asset('datatables-ptbr.json') }}"
            }
        });
        });
    </script>
@stop