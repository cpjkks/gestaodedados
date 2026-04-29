<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoDePergunta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_de_pergunta';

    protected $fillable = [
        'nome',
    ];

    public function questoes(): HasMany
    {
        return $this->hasMany(Questao::class, 'tipo_de_pergunta_id');
    }

}            