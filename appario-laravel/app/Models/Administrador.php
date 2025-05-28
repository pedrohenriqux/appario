<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    // $fillable Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'usuario_id',
    ];
}
