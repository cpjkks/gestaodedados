<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OpcaoQuestao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'opcoes_questoes';

    protected $fillable = [
        'nome',
        'questao_id',
    ];

    public function questao(): BelongsTo
    {
        return $this->belongsTo(Questao::class, 'questao_id');
    }
}
