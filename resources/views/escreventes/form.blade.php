<div class="card-body">
    <div class="form-group">
        <label for="esc_nome">Nome Completo</label>
        <input type="text" class="form-control" id="esc_nome" name="esc_nome" placeholder="Nome do escrevente" 
        value="{{ old('esc_nome', isset($escreventes) ? $escreventes->esc_nome : '')  }}">
    </div>
</div>
<div class="card-footer">
    <a href="{{ route('escrevente.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Salvar</button>
</div>
