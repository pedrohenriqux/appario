<?php

namespace App\Policies;

use App\Models\Apiario;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class ApiarioPolicy
{
   
    public function viewAny(Usuario $usuario): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Apiario $apiario): bool
    {
        return $usuario->pessoa &&
           $apiario->pessoa_id === $usuario->pessoa->id_pessoa;
    }

    public function create(Usuario $usuario, Apiario $apiario): Response
    {
        if (
        $usuario->pessoa &&
        $usuario->pessoa->tipo === 'RESPONSAVEL' &&
        $apiario->pessoa_id === $usuario->pessoa->id_pessoa
        ) {
            return Response::allow();
        }

        return Response::deny('Você não tem permissão para criar este apiário.');
    }

    public function update(Usuario $usuario, Apiario $apiario): bool
    {
        return $usuario->pessoa &&
           $usuario->pessoa->tipo === 'RESPONSAVEL' &&
           $apiario->pessoa_id === $usuario->pessoa->id_pessoa; 
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Apiario $apiario): bool
    {
        return $usuario->pessoa &&
           $usuario->pessoa->tipo === 'RESPONSAVEL' &&
           $apiario->pessoa_id === $usuario->pessoa->id_pessoa; 
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Apiario $apiario): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Apiario $apiario): bool
    {
        return false;
    }
}
