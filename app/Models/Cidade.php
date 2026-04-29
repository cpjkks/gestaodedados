<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cidades';

    protected $fillable = [
        'nome',
        'estado_id',
    ];

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
    
    public function bairros(): HasMany
    {
        return $this->hasMany(Bairro::class, 'cidade_id');
    }

}