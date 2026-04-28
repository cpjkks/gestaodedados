<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'tipos_de_turno';

    protected $fillable = [
        'nome',
    ];


}