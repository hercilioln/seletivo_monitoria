<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'endereco' => 'required|string|max:255',
            'rg' => 'required|string|max:20',
            'cpf' => 'required|unique:alunos,cpf',
            'matricula' => 'required|string|max:50',
            'telefone' => 'required|string|max:20',
            'historico' => 'required|file|mimes:pdf|max:16000',
        ];
    }
}
