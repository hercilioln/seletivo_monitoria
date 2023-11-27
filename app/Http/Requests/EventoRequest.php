<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            'cursos_id' => 'required|exists:cursos,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_inicial' => 'required',
            'data_final' => 'required',
            'arquivos' => 'required|file|mimes:pdf|max:16000'
        ];
    }
}
