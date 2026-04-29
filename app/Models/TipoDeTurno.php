<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoDeTurno extends Model
{
    use SoftDeletes;


    protected $table = 'tipos_de_turno';

    protected $fillable = [
        'nome',
    ];


}