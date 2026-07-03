<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    // Define explicitamente o nome da tabela no banco de dados (plural correto em português)
    protected $table = 'musicas';

    // Campos que podem ser preenchidos em massa (Mass Assignment)
    protected $fillable = [
        'titulo',
        'duracao',
        'album_id',
    ];

    /**
     * Define a relação inversa de Muitos para 1 (N:1).
     * Várias músicas pertencem a um único álbum.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        // belongsTo indica que esta música pertence a um álbum específico.
        // O Laravel utilizará a chave estrangeira 'album_id' presente nesta tabela.
        return $this->belongsTo(Album::class, 'album_id');
    }
}
