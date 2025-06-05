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
}
