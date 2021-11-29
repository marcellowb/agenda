<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'                 => 'required',
            'email'                => 'nullable|email',
            'telefone'             => 'nullable',
            'estado_id'            => 'nullable|exists:estados,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required'                => "O Nome é obrigatório",
            'email.email'                  => "O Email é inválido",
            'estado_id.exists'             => "O Estado não foi encontrado",
        ];
    }

}
