<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artista', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incremento
            $table->string('nome'); // Título do álbum
            $table->string('foto_url')->nullable(); // URL opcional da capa do álbum
            $table->timestamps(); // Colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artista');
    }
};
