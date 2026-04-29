<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'questinarios';

    protected $fillable = [
        'nome',
        'processo_id',
    ];

    public function processoPreMatricula(): BelongsTo
    {
        return $this->belongsTo(ProcessoPreMatricula::class, 'processo_id');
    }

    public function questoes(): HasMany
    {
        return $this->hasMany(Questao::class, 'questionario_id');
    }
}            