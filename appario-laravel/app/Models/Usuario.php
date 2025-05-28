<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use HasFactory, Notifiable;

    // $fillable Atributos que podem ser preenchidos em massa (segurança contra mass assignment).
    protected $fillable = [
        'name',
        'email',
        'senha',
    ];

    // $hidden Atributos que devem ser ocultados ao serializar o modelo (para JSON/array).
    protected $hidden = [
        'senha',
        'rememberToken',
    ];

    // $casts Converte automaticamente atributos entre tipos PHP e do banco de dados.
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
