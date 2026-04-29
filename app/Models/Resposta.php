<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resposta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'respostas';

    protected $fillable = [
        'resposta',
        'questao_id',
        'inscricao_id',
    ];

    public function questao(): BelongsTo
    {
        return $this->belongsTo(Questao::class, 'questao_id');
    }

    public function inscricoesLegadas(): BelongsTo
    {
        return $this->belongsTo(QuestInscricaoLegadaao::class, 'inscricao_id');
    }
}
