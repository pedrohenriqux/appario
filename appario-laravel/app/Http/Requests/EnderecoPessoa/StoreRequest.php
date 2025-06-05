<?php

namespace App\Http\Requests\EnderecoPessoa;

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
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:10',
            'bairro' => 'required|string|max:50',
            'cep' => 'required|string|size:10',
            'cidade' => 'required|string|max:50',
            'estado' => ['required', 'string', 'size:2', Rule::in($ufs)],
            'pessoa_id' => 'required|integer|exists:pessoas,id_pessoa',
        ];
    }
}
