<div class="card-body">
    <div class="row">
        <div class="form-group col-md-3">
            <label for="user_name">Nome Completo</label>
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nome Completo" 
            value="{{ old('user_name', isset($user) ? $user->name : '') }}">
        </div>
        <div class="form-group col-md-3">
            <label for="rg">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" 
            value="{{ old('rg', isset($alunos) ? $alunos->rg : '')  }}">
        </div>
        <div class="form-group col-md-3">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" 
            value="{{ old('cpf', isset($alunos) ? $alunos->cpf : '')  }}">
        </div>
        <div class="form-group col-md-3">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="000-000000" 
            value="{{ old('matricula', isset($alunos) ? $alunos->matricula : '')  }}">
        </div>
        <div class="form-group col-md-3">
            <label for="endereco">Endereco</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" 
            value="{{ old('endereco', isset($alunos) ? $alunos->endereco : '')  }}">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" 
            value="{{ old('email', isset($user) ? $user->email : '')  }}">
        </div>
        <div class="form-group col-md-4">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha" 
            value="{{ old('password', isset($user) ? $user->password : '')  }}">
        </div>
        <div class="form-group col-md-4">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" 
            value="{{ old('telefone', isset($alunos) ? $alunos->telefone : '')  }}">
        </div>
    </div>

    <div class="form-group">
        <label for="historico">Histórico</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="historico" name="historico" onchange="updateFileName(this)">
                <label class="custom-file-label" for="historico">Escolher arquivo</label>
            </div>
        </div>
    </div>
    
</div>

<div class="card-footer">
    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Salvar</button>
</div>


<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        $(input).next('.custom-file-label').html(fileName);
    }
</script>
