<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Telefone extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'telefone1' => 'required|string|max:20';
            'telefone2' => 'required|string|max:20';
            'tipoTelefone' => [
                'required', 
                Rule::in(['CELULAR', 'FIXO'])
            ],
            'pessoa_id' => [
                'required',
                'exists:pessoas, id_pessoa'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',
            'max' => 'o campo :attribute deve ter no maximo :max caracteres.',
        ];
    }
}
