<div class="card-body">
    <div class="form-group">
        <label for="coc_nome">Cartório</label>
        <input type="text" class="form-control" id="coc_nome" name="coc_nome" 
        value="{{ isset($cartorio) ? $cartorio->coc_nome : '' }}">
    </div>
    <div class="form-group">
        <label for="coc_comarca">Comarca</label>
        <input type="text" class="form-control" id="coc_comarca" name="coc_comarca" 
        value="{{ isset($cartorio) ? $cartorio->coc_comarca : '' }}">
    </div>
    <div class="form-group">
        <label for="coc_registrador">Registrador</label>
        <input type="text" class="form-control" id="coc_registrador" name="coc_registrador" 
        value="{{ isset($cartorio) ? $cartorio->coc_registrador : '' }}">
    </div>
    <div class="form-group">
        <label for="coc_endereco">Edereço</label>
        <input type="text" class="form-control" id="coc_endereco" name="coc_endereco" 
        value="{{ isset($cartorio) ? $cartorio->coc_endereco : '' }}">
    </div>
    <div class="form-group">
        <label for="coc_cidade">Cidade</label>
        <input type="text" class="form-control" id="coc_cidade" name="coc_cidade" 
        value="{{ isset($cartorio) ? $cartorio->coc_cidade : '' }}">
    </div>
</div>
<div class="card-footer">
    <a href="{{ route('cartorio.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Cancelar</a>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Salvar</button>
</div>