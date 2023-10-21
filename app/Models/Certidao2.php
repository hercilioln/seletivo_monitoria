<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certidao2 extends Model
{
    use HasFactory;
    protected $table = 'certidao2s';
    protected $fillable = [
        'cer_nome_pessoa',
        'cer_cpf',
        'cer_matricula',
        'cer_data_nascimento_extenso',
        'cer_data_nascimento',
        'cer_hora_nascimento',
        'cer_naturalidade',
        'cer_municipio_registro_uf',
        'cer_local_nascimento',
        'cer_sexo',
        'cer_filiacao_nome_pai',
        'cer_filiacao_nome_mae',
        'cer_avos_paternos',
        'cer_avos_maternos',
        'cer_gemeos',
        'cer_matricula_gemeos',
        'cer_data_registro_extenso',
        'cer_numero_dnv',
        'cer_observacao',
        'cer_anotacoes_cadastro',
        'cer_cidade_e_data',
        'cartorio_id',
        'escrevente_id',
    ];

    public function cartorios()
    {
        return $this->belongsTo(ConfiguracaoCartorio::class, 'cartorio_id');
    }

    public function escreventes()
    {
        return $this->belongsTo(Escrevente::class, 'escrevente_id');
    }
}
