<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoStoreRequest extends FormRequest
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
            'nome'         => "required|min:2|max:190",
            'telefone'     => "required|min:10|unique:contatos",
            'email'        => "required|unique:contatos|email",
            'cep'          => "required",
            'logradouro'   => "required",
            'complemento',
            'bairro'       => "required",
            'localidade'   => "required",
            'uf'           => "required|min:2"
        ];
    }
}
