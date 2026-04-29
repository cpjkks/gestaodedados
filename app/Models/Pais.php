<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    use SoftDeletes;

    protected $table = 'paises';

    protected $fillable = [
        'nome',
    ];

        public function estados(): HasMany
    {
        return $this->hasMany(Estado::class, 'pais_id');
    }

}