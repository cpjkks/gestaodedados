<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscricoes_legadas', function (Blueprint $table) {
            $table->id(); 
            $table->string('cep', 9);
            $table->foreignId('ano_de_escolaridade_id')->constrained('anos_de_escolaridade');
            $table->geometry('coordenadas', subtype: 'point', srid: 4326);
            $table->index('coordenadas', 'idx_inscricoes_coordenadas_gist', 'gist');
            $table->foreignId('processo_id')->constrained('processos_pre_matricula');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscricoes_legadas');
    }
};
