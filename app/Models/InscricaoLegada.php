<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InscricaoLegada.php extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inscricoes_legadas';

    protected $fillable = [
        'cep',
        'coordenadas',
        'processo_id',
        'ano_de_escolaridade_id'
    ];

    public function processoPreMatricula(): BelongsTo
    {
        return $this->belongsTo(ProcessoPreMatricula::class, 'processo_id');
    }

    public function anoDeEscolaridade(): BelongsTo
    {
        return $this->belongsTo(AnoDeEscolaridade::class, 'ano_de_escolaridade_id');
    }

    public function inscricoesUnidadesLegadas(): HasMany
    {
        return $this->hasMany(InscricaoUnidadeLegada::class, 'inscricao_id');
    }

    public function respostas(): HasMany
    {
        return $this->hasMany(Resposta::class, 'inscricao_id');
    }

}
