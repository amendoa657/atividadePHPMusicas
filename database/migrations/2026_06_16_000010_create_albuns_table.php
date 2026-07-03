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
        // Criação da tabela 'albuns'
        Schema::create('albuns', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incremento
            $table->string('titulo'); // Título do álbum
            $table->integer('ano'); // Ano de lançamento do álbum
            $table->string('capa_url')->nullable(); // URL opcional da capa do álbum
            $table->string('nome')->nullable();
            $table->timestamps(); // Colunas 'created_at' e 'updated_at'
            $table->foreignId('artista_id')->nullable()->constrained('artistas')->onDelete('cascade');
        });
    }

    /**
     * Reverte as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albuns');
    }
};
