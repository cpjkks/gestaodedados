<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnoDeEscolaridade extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Define o nome da tabela (opcional se seguir o padrão plural do Laravel,
     * mas boa prática para evitar ambiguidades em sistemas legados).
     */
    protected $table = 'anos_de_escolaridade';

    /**
     * Mass Assignment: Define quais campos podem ser preenchidos via formulário.
     * Isso impede que usuários mal-intencionados injetem dados em colunas protegidas.
     */
    protected $fillable = [
        'nome',
        'curso_id',
    ];

    /**
     * RELACIONAMENTOS (Eloquent Relationships)
     * * Um curso possui muitos anos de escolaridade.
     * Isso permite fazer: $curso->anosDeEscolaridade
     */
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function anosDeEscolaridade(): HasMany
    {
        return $this->hasMany(AnoDeEscolaridade::class, 'ano_de_escolaridade_id');
    }

}