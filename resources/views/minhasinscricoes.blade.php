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



</head>
<body>

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
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
    
    @foreach ($inscricoes as $inscricao)
    <div class="alert alert-{{ $inscricao->status === 'pendente' ? 'warning' : ($inscricao->status === 'aprovado' ? 'success' : 'danger') }}" role="alert">
        <h4 class="alert-heading">{{ $inscricao->status === 'pendente' ? 'Pendente' : ($inscricao->status === 'aprovado' ? 'Aprovado' : 'Reprovado') }}</h4>
        <p> Disciplina: {{$inscricao->vaga->disciplina->nome}}</p>
        <hr>
        <p class="mb-0">Evento: {{$inscricao->vaga->evento->cursos->nome}} - {{$inscricao->vaga->evento->nome}}</p>
      </div>
    @endforeach
</div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <!-- Add your additional scripts here -->

</body>
</html>
