<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apiario extends Model
{   
    protected $primaryKey = 'id_apiario';
    public $incrementing = true;
    protected $keyType = 'int';


    protected $fillable = [
        'area',
        'coordenadas',
        'data_criacao',
        'nome',
        'pessoa_id',
    ];

    // Relação com pessoa (1:N)
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id_pessoa');
    }

    // Relação com endereços (1:N)
    public function enderecos()
    {
        return $this->hasOne(EnderecoApiario::class, 'apiario_id', 'id_apiario');
    }
}
