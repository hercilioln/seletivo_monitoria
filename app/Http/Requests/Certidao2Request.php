<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Certidao2Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cer_nome_pessoa' => 'required',
            'cer_cpf' => 'required|cpf',
            'cer_matricula' => 'required',
            'cer_data_nascimento_extenso' => 'required',
            'cer_data_nascimento' => 'required',
            'cer_hora_nascimento' => 'required',
            'cer_naturalidade' => 'required',
            'cer_municipio_registro_uf' => 'required',
            'cer_local_nascimento' => 'required',
            'cer_sexo' => 'required',
            'cer_filiacao_nome_pai' => 'nullable',
            'cer_filiacao_nome_mae' => 'required',
            'cer_avos_paternos' => 'nullable',
            'cer_avos_maternos' => 'required',
            'cer_gemeos' => 'required',
            'cer_matricula_gemeos' => 'nullable',
            'cer_data_registro_extenso' => 'required',
            'cer_numero_dnv' => 'required',
            'cer_observacao' => 'nullable',
            'cer_anotacoes_cadastro' => 'nullable',
            'cer_cidade_e_data' => 'required',
            'cartorio_id' => 'required|exists:configuracao_cartorios,id',
            'escrevente_id' => 'required|exists:escreventes,id',
        ];
    }
}
