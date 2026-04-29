<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estados';

    protected $fillable = [
        'nome',
        'pais_id',
    ];

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }
    
    public function estados(): HasMany
    {
        return $this->hasMany(Estado::class, 'pais_id');
    }

}