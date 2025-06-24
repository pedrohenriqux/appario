<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UsuarioResetPasswordNotification;


class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_usuario';

    // $fillable Atributos que podem ser preenchidos em massa (segurança contra mass assignment).
    protected $fillable = [
        'email',
        'password',
        'tipo'
    ];

    // $hidden Atributos que devem ser ocultados ao serializar o modelo (para JSON/array).
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // $casts Converte automaticamente atributos entre tipos PHP e do banco de dados.
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, 'usuario_id', 'id_usuario');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UsuarioResetPasswordNotification($token));
    }
}
