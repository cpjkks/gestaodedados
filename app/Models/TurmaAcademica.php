<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TurmaAcademica.php extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turmas_academicas';

    protected $fillable = [
        'status',
        'unidade_id',
        'curso_id',
        'periodo_letivo_id',
        'turno_id',
        'ano_de_escolaridade_id',
        'numero_de_vagas_padrao',
        'total_vagas',
    ];

    public function unidade_acemicas(): BelongsTo
    {
        return $this->belongsTo(UnidadeAcademica::class, 'unidade_id');
    }

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function periodoLetivo(): BelongsTo
    {
        return $this->belongsTo(PeriodoLetivo::class, 'periodo_letivo_id');
    }

    public function turno(): BelongsTo
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }

    public function anoDeEscolaridade(): BelongsTo
    {
        return $this->belongsTo(Turno::class, 'ano_de_escolaridade_id');
    }  

}

