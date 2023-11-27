<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="cursos_id">Curso</label>
            <select class="form-control {{ $errors->has('cursos_id') ? 'is-invalid' : '' }}" id="cursos_id" name="cursos_id">
                <option value="">Selecione um Curso</option>
                @forelse ($cursos as $curso)
                    <option value="{{ $curso->id }}"
                        {{ (old('cursos_id') == $curso->id) ? 'selected' : '' }}>
                        {{ $curso->nome }}
                    </option>
                @empty
                    <option value="">
                        Nenhum curso encontrado
                    </option>
                @endforelse
            </select>
            @if ($errors->has('cursos_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('cursos_id') }}
                </div>
            @endif
        </div>
        <div class="form-group col-md-6">
            <label for="nome">Evento</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Evento" 
            value="{{ old('nome', isset($eventos) ? $eventos->nome : '')  }}">
        </div>
    </div>
   <div class="row">
    <div class="form-group col-md-6">
        <label for="data_inicial">Data Inicial</label>
        <input type="date" class="form-control" id="data_inicial" name="data_inicial" placeholder="Data Inicial do Evento" 
        value="{{ old('data_inicial', isset($eventos) ? $eventos->data_inicial : '')  }}">
    </div>
    <div class="form-group col-md-6">
        <label for="data_final">Data Final</label>
        <input type="date" class="form-control" id="data_final" name="data_final" placeholder="Data Final do Evento" 
        value="{{ old('data_final', isset($eventos) ? $eventos->data_final : '')  }}">
    </div>
   </div>
    <div class="form-group">
        <label for="arquivos">Arquivo de Edital</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="arquivos" name="arquivos" onchange="updateFileName(this)"> 
                <label class="custom-file-label" for="arquivos">Escolher arquivo</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição do Evento">
            {{ old('descricao', isset($eventos) ? $eventos->descricao : '') }}
        </textarea>
    </div>
    
</div>

<div class="card-footer">
    <a href="{{ route('eventos.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Salvar</button>
</div>

<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        $(input).next('.custom-file-label').html(fileName);
    }
</script>