<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->foreignId('tipo_de_pergunta_id')->constrained('tipos_de_pergunta');
            $table->foreignId('questionario_id')->constrained('questionarios');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questoes');
    }
};

