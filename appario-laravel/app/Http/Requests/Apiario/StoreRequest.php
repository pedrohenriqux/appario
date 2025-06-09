<?php

namespace App\Http\Requests\Apiario;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'area' => 'required|numeric|max:50',
            'data_criacao' => 'required|date',
            'coordenadas' => 'required|string|max:70',
            'pessoa_id' => 'required|exists:pessoas,id_pessoa',
        ];
    }

}