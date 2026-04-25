<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('questao_id')->constrained('questoes'); 
            $table->string('resposta');
            $table->foreignId('inscricao_id')->constrained('inscricoes_legadas');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respostas');
    }
};
