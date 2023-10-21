@extends('adminlte::page')

@section('title', 'Configuração Cartório')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/jquery.dataTables.min.css') }}">
@stop

@section('content_header')
    <h1>Configuração Cartório</h1>
@stop

@section('content')
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('cartorio.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Cartório</a>
</div>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Cartório</h3>
    </div>
    <div class="card-body">
      <div class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <table id="example" class="table table-bordered hover dataTable dtr-inline" aria-describedby="example1_info">
              <thead>
                <tr>
                  <th class="sorting sorting_asc" tabindex="0">Nome</th>
                  <th class="sorting" tabindex="0">Comarca</th>
                  <th class="sorting" tabindex="0">Registrador</th>
                  <th class="sorting" tabindex="0">Endereço</th>
                  <th class="sorting" tabindex="0">Cidade</th>
                  <th class="sorting" tabindex="0">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartorio as $cartorios )
                <tr class="odd">
                  <td>{{$cartorios->coc_nome}}</td>
                  <td>{{$cartorios->coc_comarca}}</td>
                  <td>{{$cartorios->coc_registrador}}</td>
                  <td>{{$cartorios->coc_endereco}}</td>
                  <td>{{$cartorios->coc_cidade}}</td>
                  <td class="text-right align-middle">
                    <!-- Botão de editar -->
                    <a href="{{ route('cartorio.edit', $cartorios->id) }}" class="btn btn-sm btn-warning mr-2"><i class="fa fa-edit"></i> Editar</a>
                    <!-- Botão de excluir -->
                    <form action="{{ route('cartorio.destroy', $cartorios->id) }}" method="POST" style="display: inline-block;">
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