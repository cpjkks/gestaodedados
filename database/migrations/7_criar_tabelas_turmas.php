<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turmas_academicas', function (Blueprint $table) {
            $table->id(); 
            $table->integer('status');
            $table->foreignId('unidade_id')->constrained('unidades_academicas');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('periodo_letivo_id')->constrained('periodos_letivos');
            $table->foreignId('turno_id')->constrained('turnos');
            $table->foreignId('ano_de_escolaridade_id')->constrained('anos_de_escolaridade');
            $table->integer('numero_de_vagas_padrao');
            $table->integer('total_vagas');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turmas_academicas');
    }
};
