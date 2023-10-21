@extends('adminlte::page')

@section('title', 'Escreventes')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Escreventes</h1>
@stop

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('escrevente.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Escrevente</a>
</div>


<div class="card">
    <div class="card-header">
      <h3 class="card-title">Itens Cadastrados</h3>
    </div>
    <div class="card-body">
      <div class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <table id="example" class="table table-bordered hover dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-right align-middle">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($escreventes as $items)
                    <tr>
                        <td class="align-middle">{{$items->esc_nome}}</td>
                        <td class="text-right align-middle">
                            <!-- Botão de editar -->
                            <a href="{{ route('escrevente.edit', $items->id) }}" class="btn btn-sm btn-warning mr-2"><i class="fa fa-edit"></i> Editar</a>
                            <!-- Botão de excluir -->
                            <form action="{{ route('escrevente.destroy', $items->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este escrevente?')"><i class="fas fa-trash"></i> Excluir</button>
                            </form>
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