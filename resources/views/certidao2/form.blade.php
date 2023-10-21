<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="cer_nome_pessoa">* Nome Completo</label>
            <input type="text" class="form-control" id="cer_nome_pessoa" name="cer_nome_pessoa"
            value="{{ old('cer_nome_pessoa', isset($certidao) ? $certidao->cer_nome_pessoa : '') }}">
            {!! $errors->first('cer_nome_pessoa', '<span class="text-red">:message</span>') !!}
        </div>
        <div class="form-group col-md-6">
            <label for="cer_cpf">* CPF</label>
            <input type="text" class="form-control" id="cer_cpf" name="cer_cpf" 
            value="{{ old('cer_cpf', isset($certidao) ? $certidao->cer_cpf : '') }}">
            {!! $errors->first('cer_cpf', '<span class="text-red">:message</span>') !!}
        </div>
    </div>
    <div class="form-group">
        <label for="cer_matricula">* Matrícula</label>
        <input type="text" class="form-control" id="cer_matricula" name="cer_matricula" 
        value="{{ old('cer_matricula', isset($certidao) ? $certidao->cer_matricula : '') }}">
        {!! $errors->first('cer_matricula', '<span class="text-red">:message</span>') !!}
    </div>

   <div class="row">
        <div class="form-group col-md-6">
            <label for="cer_data_nascimento_extenso">* Data de Nascimento por Extenso</label>
            <input type="text" class="form-control" id="cer_data_nascimento_extenso" name="cer_data_nascimento_extenso" 
            value="{{ old('cer_data_nascimento_extenso', isset($certidao) ? $certidao->cer_data_nascimento_extenso : '') }}">
            {!! $errors->first('cer_data_nascimento_extenso', '<span class="text-red">:message</span>') !!}
        </div>
        <div class="form-group col-md-3">
            <label for="cer_data_nascimento">* Data de Nascimento</label>
            <input type="date" class="form-control" id="cer_data_nascimento" name="cer_data_nascimento" 
            value="{{ old('cer_data_nascimento', isset($certidao) ? $certidao->cer_data_nascimento : '') }}">
            {!! $errors->first('cer_data_nascimento', '<span class="text-red">:message</span>') !!}
        </div>
        <div class="form-group col-md-3">
            <label for="cer_hora_nascimento">* Hora de Nascimento</label>
            <input type="time" class="form-control" id="cer_hora_nascimento" name="cer_hora_nascimento" 
            value="{{ old('cer_hora_nascimento', isset($certidao) ? $certidao->cer_hora_nascimento : '') }}">
            {!! $errors->first('cer_hora_nascimento', '<span class="text-red">:message</span>') !!}
        </div>
   </div>

   <div class="row">
    <div class="form-group col-md-4">
        <label for="cer_naturalidade">* Naturalidade</label>
        <input type="text" class="form-control" id="cer_naturalidade" name="cer_naturalidade" 
        value="{{ old('cer_naturalidade', isset($certidao) ? $certidao->cer_naturalidade : '') }}">
        {!! $errors->first('cer_naturalidade', '<span class="text-red">:message</span>') !!}
    </div>
   <div class="form-group col-md-4">
        <label for="cer_municipio_registro_uf">* Municipio de Registro UF</label>
        <input type="text" class="form-control" id="cer_municipio_registro_uf" name="cer_municipio_registro_uf" 
        value="{{ old('cer_municipio_registro_uf', isset($certidao) ? $certidao->cer_municipio_registro_uf : '') }}">
        {!! $errors->first('cer_municipio_registro_uf', '<span class="text-red">:message</span>') !!}
    </div>
   <div class="form-group col-md-4">
        <label for="cer_local_nascimento">* Local Nascimento</label>
        <input type="text" class="form-control" id="cer_local_nascimento" name="cer_local_nascimento" 
        value="{{ old('cer_local_nascimento', isset($certidao) ? $certidao->cer_local_nascimento : '') }}">
        {!! $errors->first('cer_local_nascimento', '<span class="text-red">:message</span>') !!}
    </div>
   </div>

    <div class="form-group">
        <label for="cer_sexo">* Sexo</label>
        <select class="form-control {{ $errors->has('cer_sexo') ? 'is-invalid' : '' }}" id="cer_sexo" name="cer_sexo">
            <option value="">Selecione o sexo</option>
            <option value="masculino" {{ (old('cer_sexo', isset($certidao) ? $certidao->cer_sexo : '') == 'masculino') ? 'selected' : '' }}>Masculino</option>
            <option value="feminino" {{ (old('cer_sexo', isset($certidao) ? $certidao->cer_sexo : '') == 'feminino') ? 'selected' : '' }}>Feminino</option>
        </select>
        @if ($errors->has('cer_sexo'))
            <div class="invalid-feedback">
                {{ $errors->first('cer_sexo') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="cer_filiacao_nome_pai">Filiação Nome do Pai</label>
            <input type="text" class="form-control" id="cer_filiacao_nome_pai" name="cer_filiacao_nome_pai" 
            value="{{ old('cer_filiacao_nome_pai', isset($certidao) ? $certidao->cer_filiacao_nome_pai : '') }}">
            {!! $errors->first('cer_filiacao_nome_pai', '<span class="text-red">:message</span>') !!}
        </div>
        <div class="form-group col-md-6">
            <label for="cer_filiacao_nome_mae">Filiação Nome da Mãe</label>
            <input type="text" class="form-control" id="cer_filiacao_nome_mae" name="cer_filiacao_nome_mae" 
            value="{{ old('cer_filiacao_nome_mae', isset($certidao) ? $certidao->cer_filiacao_nome_mae : '') }}">
            {!! $errors->first('cer_filiacao_nome_mae', '<span class="text-red">:message</span>') !!}
        </div>
    </div>

    <div class="form-group">
        <label for="cer_avos_paternos">Avós Paternos</label>
        <input type="text" class="form-control" id="cer_avos_paternos" name="cer_avos_paternos" 
        value="{{ old('cer_avos_paternos', isset($certidao) ? $certidao->cer_avos_paternos : '') }}">
        {!! $errors->first('cer_avos_paternos', '<span class="text-red">:message</span>') !!}
    </div>
    <div class="form-group">
        <label for="cer_avos_maternos">Avós Maternos</label>
        <input type="text" class="form-control" id="cer_avos_maternos" name="cer_avos_maternos" 
        value="{{ old('cer_avos_maternos', isset($certidao) ? $certidao->cer_avos_maternos : '') }}">
        {!! $errors->first('cer_avos_maternos', '<span class="text-red">:message</span>') !!}
    </div>

   <div class="row">
        <div class="form-group col-md-3">
            <label for="cer_gemeos">Gêmeos?</label>
            <select class="form-control {{ $errors->has('cer_gemeos') ? 'is-invalid' : '' }}" id="cer_gemeos" name="cer_gemeos">
                <option value="0" {{ (old('cer_gemeos', isset($certidao) ? $certidao->cer_gemeos : '') == '0' || old('cer_gemeos') === null) ? 'selected' : '' }}>Não</option>
                <option value="1" {{ (old('cer_gemeos', isset($certidao) ? $certidao->cer_gemeos : '') == '1') ? 'selected' : '' }}>Sim</option>
            </select>
            @if ($errors->has('cer_gemeos'))
                <div class="invalid-feedback">
                    {{ $errors->first('cer_gemeos') }}
                </div>
            @endif
        </div>
        <div class="form-group col-md-9">
            <label for="cer_matricula_gemeos">Matrícula de Gêmeos</label>
            <input type="text" class="form-control" id="cer_matricula_gemeos" name="cer_matricula_gemeos" placeholder="Somente se houver"
            value="{{ old('cer_matricula_gemeos', isset($certidao) ? $certidao->cer_matricula_gemeos : '') }}">
            {!! $errors->first('cer_matricula_gemeos', '<span class="text-red">:message</span>') !!}
        </div>
   </div>

   <div class="form-group">
        <label for="cer_data_registro_extenso">Data do Registro por Extenso</label>
        <input type="text" class="form-control" id="cer_data_registro_extenso" name="cer_data_registro_extenso" 
        value="{{ old('cer_data_registro_extenso', isset($certidao) ? $certidao->cer_data_registro_extenso : '') }}">
        {!! $errors->first('cer_data_registro_extenso', '<span class="text-red">:message</span>') !!}
    </div>
   <div class="form-group">
        <label for="cer_numero_dnv">Número DNV</label>
        <input type="text" class="form-control" id="cer_numero_dnv" name="cer_numero_dnv" 
        value="{{ old('cer_numero_dnv', isset($certidao) ? $certidao->cer_numero_dnv : '') }}">
        {!! $errors->first('cer_numero_dnv', '<span class="text-red">:message</span>') !!}
    </div>
   <div class="form-group">
        <label for="cer_observacao">Observação</label>
        <input type="text" class="form-control" id="cer_observacao" name="cer_observacao" 
        value="{{ old('cer_observacao', isset($certidao) ? $certidao->cer_observacao : '') }}">
        {!! $errors->first('cer_observacao', '<span class="text-red">:message</span>') !!}
    </div>
   <div class="form-group">
        <label for="cer_anotacoes_cadastro">Anotações</label>
        <input type="text" class="form-control" id="cer_anotacoes_cadastro" name="cer_anotacoes_cadastro" 
        value="{{ old('cer_anotacoes_cadastro', isset($certidao) ? $certidao->cer_anotacoes_cadastro : '') }}">
        {!! $errors->first('cer_anotacoes_cadastro', '<span class="text-red">:message</span>') !!}
    </div>
   <div class="form-group">
        <label for="cer_cidade_e_data">Cidade e Data</label>
        <input type="text" class="form-control" id="cer_cidade_e_data" name="cer_cidade_e_data" 
        value="{{ old('cer_cidade_e_data', isset($certidao) ? $certidao->cer_cidade_e_data : '') }}">
        {!! $errors->first('cer_cidade_e_data', '<span class="text-red">:message</span>') !!}
    </div>


    
<div class="form-group">
    <label for="cartorio_id">Cartório</label>
    <select class="form-control {{ $errors->has('cartorio_id') ? 'is-invalid' : '' }}" id="cartorio_id" name="cartorio_id">
        @forelse ($cartorios as $item)
            <option value="{{ $item->id }}"
                {{ (old('cartorio_id', isset($certidao) ? $certidao->cartorio_id : '') == $item->id) ? 'selected' : '' }}>
                {{ $item->coc_nome }}
            </option>
        @empty
            <option value="">
                Nenhum cartório encontrado
            </option>
        @endforelse
    </select>
    @if ($errors->has('cartorio_id'))
        <div class="invalid-feedback">
            {{ $errors->first('cartorio_id') }}
        </div>
    @endif
</div>
    
<div class="form-group">
    <label for="escrevente_id">Escrevente</label>
    <select class="form-control {{ $errors->has('escrevente_id') ? 'is-invalid' : '' }}" id="escrevente_id" name="escrevente_id">
        <option value="">Selecione um escrevente</option>
        @forelse ($escreventes as $item)
            <option value="{{ $item->id }}"
                {{ (old('escrevente_id', isset($certidao) ? $certidao->escrevente_id : '') == $item->id) ? 'selected' : '' }}>
                {{ $item->esc_nome }}
            </option>
        @empty
            <option value="">
                Nenhum escrevente encontrado
            </option>
        @endforelse
    </select>
    @if ($errors->has('escrevente_id'))
        <div class="invalid-feedback">
            {{ $errors->first('escrevente_id') }}
        </div>
    @endif
</div>

</div>

</div>


<div class="card-footer">
    <a href="{{ route('certidao2.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i> Salvar</button>
</div>
