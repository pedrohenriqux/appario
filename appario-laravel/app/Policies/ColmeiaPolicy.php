<?php

namespace App\Policies;

use App\Models\Colmeia;
use App\Models\Usuario;

class ColmeiaPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->pessoa !== null;
    }

    public function view(User $user, Colmeia $colmeia): bool
    {
        return $user->pessoa && $colmeia->apiario->pessoa_id === $user->pessoa->id_pessoa;
    }

    public function create(User $user): bool
    {
        return $user->pessoa !== null;
    }

    public function update(User $user, Colmeia $colmeia): bool
    {
        return $user->pessoa && $colmeia->apiario->pessoa_id === $user->pessoa->id_pessoa;
    }

    public function delete(User $user, Colmeia $colmeia): bool
    {
        return $user->pessoa && $colmeia->apiario->pessoa_id === $user->pessoa->id_pessoa;
    }
}
