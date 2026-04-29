<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turnos';

    protected $fillable = [
        'nome',
        'tipo_de_turno',
        'turno_integral',
    ];

    public function tipo_de_turno(): BelongsTo
    {
        return $this->belongsTo(TipoDeTurno::class, 'tipo_de_turno_id');
    }

    public function turmasAcademicas(): HasMany
    {
        return $this->hasMany(TurmaAcademica::class, 'turno_id');
    }
}