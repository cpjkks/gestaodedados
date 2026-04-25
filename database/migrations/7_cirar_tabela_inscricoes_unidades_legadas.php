<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscricoes_unidades_legadas', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('inscricao_id')->constrained('inscricoes_legadas');
            $table->integer('prioridade');
            $table->foreignId('unidade_id')->constrained('unidades_academicas');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscricoes_unidades_legadas');
    }
};

