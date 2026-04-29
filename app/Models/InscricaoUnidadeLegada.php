<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InscricaoUnidadeLegada.php extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inscricoes_unidades_legadas';

    protected $fillable = [
        'inscricao_id',
        'prioridade',
        'unidade_id',
    ];

    public function inscricaoLegada(): BelongsTo
    {
        return $this->belongsTo(InscricaoLegada::class, 'inscricao_id');
    }

    public function unidade(): BelongsTo
    {
        return $this->belongsTo(UnidadeAcademica::class, 'unidade_id');
    }

}
