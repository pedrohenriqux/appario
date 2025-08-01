<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Telefone extends Model
{
    /** @use HasFactory<\Database\Factories\TelefoneFactory> */
    use HasFactory;

    protected $primaryKey = 'id_telefone';

    protected $fillable = [
        'telefone1',
        'telefone1',
    ];

    public function pessoa() 
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id_pessoa');
    }
}