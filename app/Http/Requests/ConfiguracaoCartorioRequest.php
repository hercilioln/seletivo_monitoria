<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfiguracaoCartorioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'coc_nome' => ['required'],
            'coc_comarca' => ['required'],
            'coc_registrador' => ['required'],
            'coc_endereco' => ['required'],
            'coc_cidade' => ['required']
        ];
    }
}
