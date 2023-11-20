<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscricaoRequest extends FormRequest
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
            'eventos_id' => 'required|exists:eventos,id',
            'vagas_id' => 'required|exists:vagas,id',
            'alunos_id' => 'required|exists:alunos,id',
            'status' => 'required'
        ];
    }
}
