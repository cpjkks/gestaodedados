<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('processos_pre_matricula', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->integer('status');
            $table->foreignId('periodo_letivo_academico_id')->constrained('periodos_letivos');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('processos_pre_matricula');
    }
};
