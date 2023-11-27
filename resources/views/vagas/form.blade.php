<input type="hidden" name="eventos_id" value="{{ $evento->id }}">
<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="disciplinas_id">Disciplina</label>
            <select class="form-control {{ $errors->has('disciplinas_id') ? 'is-invalid' : '' }}" id="disciplinas_id" name="disciplinas_id">
                <option value="">Selecione uma Disciplina</option>
                @forelse ($disciplina->sortBy('nome') as $disciplinas)
                    <option value="{{ $disciplinas->id }}"
                        {{ (old('disciplinas_id') == $disciplinas->id) ? 'selected' : '' }}>
                        {{ $disciplinas->nome }}
                    </option>
                @empty
                    <option value="">
                        Nenhuma disciplina encontrada
                    </option>
                @endforelse
            </select>
            @if ($errors->has('disciplinas_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('disciplinas_id') }}
                </div>
            @endif
        </div>
        
        <div class="form-group col-md-6">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade"
                   value="{{ old('quantidade', isset($vagas) ? $vagas->quantidade : 1) }}">
        </div>
        
    </div>
    
</div>

<div class="card-footer">
    <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Salvar</button>
</div>
