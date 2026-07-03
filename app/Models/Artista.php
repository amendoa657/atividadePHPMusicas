<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    // Define explicitamente o nome da tabela no banco de dados (plural em português)
    protected $table = 'albuns';

    // Campos que podem ser preenchidos em massa (Mass Assignment)
    protected $fillable = [
        'titulo',
        'ano',
        'capa_url',
    ];

    /**
     * Define o relacionamento de 1 para Muitos (1:N).
     * Um álbum possui várias músicas associadas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function musicas()
    {
        // hasMany indica que este Model (Album) possui muitas instâncias do Model Musica.
        // O Laravel assume por padrão a chave estrangeira 'album_id' no Model Musica.
        return $this->hasMany(Musica::class);
    }
}
