<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'questoes';

    protected $fillable = [
        'nome',
        'tipo_de_pergunta_id',
        'questionario_id',
    ];

    public function tipoDePerguntas(): BelongsTo
    {
        return $this->belongsTo(TipoDePergunta::class, 'tipo_de_pergunta_id');
    }

    public function questionario(): BelongsTo
    {
        return $this->belongsTo(Questionario::class, 'questionario_id');
    }

    public function opcoesQuestao(): HasMany
    {
        return $this->hasMany(OpcaoQuestao::class, 'questao_id');
    }
}            
