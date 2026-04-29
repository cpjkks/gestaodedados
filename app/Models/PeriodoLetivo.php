<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeriodoLetivo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'periodos_letivos';

    protected $fillable = [
        'nome',
        'ano',
        'data_inicial',
        'data_final',
        'periodo_padrao',
    ];

    public function processosPreMatricula(): HasMany
    {
        return $this->hasMany(ProcessoPreMatricula::class, 'periodo_letivo_id');
    }

    public function turmasAcademicas(): HasMany
    {
        return $this->hasMany(TurmaAcademica::class, 'periodo_letivo_id');
    }
    
}