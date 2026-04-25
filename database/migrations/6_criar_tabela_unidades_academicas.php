
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unidades_academicas', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->geometry('coordenadas', subtype: 'point', srid: 4326);
            $table->index('coordenadas', 'idx_unidades_coordenadas_gist', 'gist');
            $table->foreignId('endereco_id')->constrained('enderecos_gerais');
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidades_academicas');
    }
};
