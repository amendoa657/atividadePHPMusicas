<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     *
     * @return void
     */
    public function up()
    {
        // Criação da tabela 'musicas'
        Schema::create('musicas', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incremento
            $table->string('titulo'); // Título da música
            $table->string('duracao'); // Duração da música (ex: "3:45")
            
            $table->foreignId('album_id')
                  ->constrained('albuns')
                  ->cascadeOnDelete();
                  
            $table->timestamps(); // Colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverte as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musicas');
    }
};
