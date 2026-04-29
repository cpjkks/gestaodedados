<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Define o nome da tabela (opcional se seguir o padrão plural do Laravel,
     * mas boa prática para evitar ambiguidades em sistemas legados).
     */
    protected $table = 'cursos';

    /**
     * Mass Assignment: Define quais campos podem ser preenchidos via formulário.
     * Isso impede que usuários mal-intencionados injetem dados em colunas protegidas.
     */
    protected $fillable = [
        'nome',
    ];

    /**
     * RELACIONAMENTOS (Eloquent Relationships)
     * * Um curso possui muitos anos de escolaridade.
     * Isso permite fazer: $curso->anosDeEscolaridade
     */
    public function anosDeEscolaridade(): HasMany
    {
        return $this->hasMany(AnoDeEscolaridade::class, 'curso_id');
    }

    public function turmasAcademicas(): HasMany
    {
        return $this->hasMany(TurmaAcademica::class, 'curso_id');
    }
}