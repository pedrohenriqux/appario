<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apiario extends Model
{

    protected $fillable = [
        'area',
        'coordenadas',
        'data_criacao',
        'id_apiario',
    ];

    // Relação com pessoa (1:N)
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id_pessoa');
    }

    // Relação com endereços (1:N)
    public function enderecos()
    {
        return $this->hasMany(EnderecoApiario::class, 'apiario_id', 'id_apiario');
    }
}
