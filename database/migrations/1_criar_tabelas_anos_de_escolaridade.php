<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anos_de_escolaridade', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anos_de_escolaridade');
    }
};
