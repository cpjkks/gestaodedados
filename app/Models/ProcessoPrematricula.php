<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProcessoPreMatricula extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'processos_pre_matricula';

    protected $fillable = [
        'nome',
        'status',
        'periodo_letivo_id',
    ];

    public function periodoLetivo(): BelongsTo
    {
        return $this->belongsTo(PeriodoLetivo::class, 'periodo_letivo_id');
    }

    public function questionarios(): HasMany
    {
        return $this->hasMany(Questionario::class, 'processo_id');
    }
}