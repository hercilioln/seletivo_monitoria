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
                         <a class="nav-link" href="#">Painel do Admin</a>
                     </li>
                 @elseif(Auth::user()->isAluno())
                     <!-- Exibir itens de menu específicos para aluno -->
                     <li class="nav-item">
                         <a class="nav-link" href="#">Área do Aluno</a>
                     </li>
                 @endif
                 <li class="nav-item">
                     <a class="nav-link" href="/logout">Logout</a>
                 </li>
             @endguest
         </ul>
     </div>
     
    </nav>

    <!-- Conteúdo da Tela Inicial -->
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Voltar</a>
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
            <h4>VAGAS</h4>
        </div>
    </div>
    <div>
        @forelse ($eventos->vagas as $vaga)
        <div class="col-md-6">
         <div class="card mb-3">
             <div class="card-body">
                 <h5 class="card-title">{{ $vaga->disciplina->nome }}</h5>
                 <p class="card-text">Vagas: {{ $vaga->quantidade }}</p>
                 @if(auth()->check())
                        @php
                            $aluno = auth()->user()->aluno;
                            $estaInscrito = $aluno->inscricoes->where('vagas_id', $vaga->id)->count();
                        @endphp

                        @if (!$estaInscrito)
                            <form action="{{ route('inscricao.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="vagas_id" value="{{ $vaga->id }}">
                                <input type="hidden" name="eventos_id" value="{{ $vaga->evento->id }}">
                                <button type="submit" class="btn btn-primary">Inscrever-se</button>
                            </form>
                        @else
                            <span class="text-success">Inscrito</span>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Inscrever-se</a>
                    @endif
             </div>
         </div>
     </div>
        @empty
            <p>Nenhuma vaga associada a este evento.</p>
        @endforelse
    </div>
</div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <!-- Add your additional scripts here -->

</body>
</html>
