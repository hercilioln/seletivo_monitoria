<div class="card-body">
    <div class="form-group">
        <label for="nome_aluno">Aluno</label>
        <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" 
        value="{{ $inscricoes->aluno->user->name }}" disabled>
    </div>
    <div class="form-group">
        <label for="nome_vaga">Vaga</label>
        <input type="text" class="form-control" id="nome_vaga" name="nome_vaga" 
        value="{{ $inscricoes->vaga->disciplina->nome }}" disabled>
    </div>
    <div class="form-group">
        <label for="edital">Edital</label>
        <input type="text" class="form-control" id="edital" name="edital" 
        value="{{ $inscricoes->vaga->evento->nome }}" disabled>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-control">
            <option value="pendente" {{ $inscricoes->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="aprovado" {{ $inscricoes->status == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
            <option value="reprovado" {{ $inscricoes->status == 'reprovado' ? 'selected' : '' }}>Reprovado</option>
        </select>
    </div>
</div>
<div class="card-footer">
    <a href="{{ route('inscricoes.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Salvar</button>
</div>