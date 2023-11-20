<div class="card-body">
    <div class="form-group">
        <label for="nome">Curso</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Disciplina" 
        value="{{ old('nome', isset($disciplinas) ? $disciplinas->nome : '')  }}">
    </div>
</div>
<div class="card-footer">
    <a href="{{ route('disciplinas.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Salvar</button>
</div>
