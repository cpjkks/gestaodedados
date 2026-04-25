<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questionarios', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->foreignId('processo_id')->constrained('processos_pre_matricula');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questionarios');
    }
};
