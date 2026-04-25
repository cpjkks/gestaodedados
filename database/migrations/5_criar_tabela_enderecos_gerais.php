<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enderecos_gerais', function (Blueprint $table) {
            $table->id(); 
            $table->string('cep', 9);
            $table->foreignId('bairro_id')->constrained('bairros');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enderecos_gerais');
    }
};
