<?php

namespace App\Http\Requests\EnderecoApiario;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true; // Permite que qualquer usuário faça essa requisição
    }


    public function rules(): array
    {
        $ufs = [
            'AC',
            'AL',
            'AP',
            'AM',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MT',
            'MS',
            'MG',
            'PA',
            'PB',
            'PR',
            'PE',
            'PI',
            'RJ',
            'RN',
            'RS',
            'RO',
            'RR',
            'SC',
            'SP',
            'SE',
            'TO'
        ];

        return [
            'logradouro' => 'required|string|max:80',
            'numero' => 'required|sting|max:10',
            'complemento' => 'required|string|max:75',
            'bairro' => 'required|string|max:50',
            'cep' => 'required|string|size:10',
            'cidade' => 'required|string|max:50',
            'estado' => ['required', 'string', 'size:2', Rule::in($ufs)],
            'apiario_id' => 'required|integer|exists:apiarios,id_apiario',
        ];
    }

    public function messages() 
    {
        return [
            'logradouro.required' => 'O campo Logradouro é obrigatório.',
            'logradouro.max' => 'O campo Logradouro não pode ter mais de :max caracteres.',
            'numero.required' => 'O campo numero é obrigatório',
            'numero.max' => 'O campo numero não pode ter mais de :max caracteres.',
            'cep.required' => 'O campo CEP é obrigatório',
            'cep.size' => 'O campo CEP deve ter exatamente 8 caracteres.',
            'cidade.required' => 'O campo Cidade é obrigatório',
            'cidade.max' => 'O campo Cidade não pode ter mais de :max caracteres.',
            'estado.required' => 'O campo Estado é obrigatório.',
            'estado.size' => 'O campo Estado deve ter exatamente 2 caracteres (sigla).',
        ];
    }
}
