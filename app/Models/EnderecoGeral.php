<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EnderecoGeral extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'enderecoes_gerais';

    protected $fillable = [
        'cep',
        'bairro_id',        
    ];

    public function bairro(): BelongsTo
    {
        return $this->belongsTo(Bairro::class, 'bairro_id');
    }

    public function unidades(): HasMany
    {
        return $this->hasMany(Unidade::class, 'endereco_id');
    }
}


