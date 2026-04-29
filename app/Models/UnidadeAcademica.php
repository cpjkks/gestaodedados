<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnidadeAcademica extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'unidades_academicas';

    protected $fillable = [
        'nome',
        'coordenadas',
        'endereco_id',       
    ];

    public function enderecoGeral(): BelongsTo
    {
        return $this->belongsTo(EnderecoGeral::class, 'endereco_id');
    }

    public function inscricoesUnidadesLegadas(): HasMany
    {
        return $this->hasMany(InscricaoUnidadeLegada::class, 'unidade_id');
    }

    public function turmasAcademicas(): HasMany
    {
        return $this->hasMany(TurmaAcademica::class, 'unidade_id');
    }
}
