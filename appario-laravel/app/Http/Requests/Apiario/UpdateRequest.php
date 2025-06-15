<?php

namespace App\Http\Requests\Apiario;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'area' => 'sometimes|numeric|max:50',
            'data_criacao' => 'sometimes|date',
            'coordenadas' => 'sometimes|string|max:70'
        ];
    }
}
