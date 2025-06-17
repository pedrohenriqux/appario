<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_usuarios';
    public $incrementing = true;
    protected $keyType = 'int';

    // $fillable Atributos que podem ser preenchidos em massa (segurança contra mass assignment).
    protected $fillable = [
        'name',
        'email',
        'senha',
    ];

    // $hidden Atributos que devem ser ocultados ao serializar o modelo (para JSON/array).
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    // $casts Converte automaticamente atributos entre tipos PHP e do banco de dados.
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
