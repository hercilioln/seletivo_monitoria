<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tela Inicial</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Custom CSS or additional stylesheets -->
    <!-- Add your own styles here -->

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">UNDB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link">Bem-vindo, {{ Auth::user()->name }}</span>
                    </li>
                    @if(Auth::user()->isAdmin())
                        <!-- Exibir itens de menu específicos para admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Painel do Admin</a>
                        </li>
                    @elseif(Auth::user()->isAluno())
                        <!-- Exibir itens de menu específicos para aluno -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('alunos.incricoes')}}">Minhas Inscrições</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Conteúdo da Tela Inicial -->
    
<div class="card">
    <div class="card-header">
    <h5 class="card-title">Editais Abertos</h5>
    </div>
    <div class="card-body">
    <div class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
        <div class="col-sm-12">
            <table id="example" class="table table-bordered hover dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>Edital</th>
                        <th>Datas de Inscrição</th>
                        <th class="text-right align-middle">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $items)
                    <tr>
                        <td class="align-middle">{{$items->nome}}</td>
                        <td class="align-middle">de {{\Carbon\Carbon::parse($items->data_inicial)->format('d/m/Y') }} a {{\Carbon\Carbon::parse($items->data_final)->format('d/m/Y') }}</td>
                        <td class="text-right align-middle">
                         
                            <a href="{{ route('edital.show', $items->id) }}" class="btn btn-sm btn-secondary mr-2"><i class="fa fa-eye"></i> Visualizar</a>
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <!-- Add your additional scripts here -->

</body>
</html>
