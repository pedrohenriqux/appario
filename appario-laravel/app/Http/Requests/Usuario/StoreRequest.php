<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;    
            // Retorna um booleano para indicar se o usuário tem permissão para executar a ação solicitada.
    }

    public function rules(): array
    {
        // Rules: retorna regras de validação para os dados da solicitação.
        return [
            // CAMPOS DE USUARIO
            'email' => 'required|email|max:255|unique:usuarios,email',
                // email – O dado no campo deve ser um endereço de e-mail válido.
                // unique – Os dados no campo não podem ter duplicatas na tabela do banco de dados.
            'password' => 'required|string|min:8|confirmed', 
                // A regra 'confirmed' permite que você exija um determinado campo duas vezes para verificar se os dados são precisos
            //'tipo' => ['required', Rule::in(['ADMIN, PESSOA'])],

             // Campos da pessoa
            'nome' => 'required|string|max:50',
            'sobrenome' => 'required|string|max:50',
            'cpf' => 'required|string|size:11|unique:pessoas,cpf',
            'tipo' => ['required', Rule::in(['APICULTOR', 'RESPONSAVEL'])],
        ];
    }
}
