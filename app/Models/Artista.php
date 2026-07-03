<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $table = 'artistas';

    protected $primarykey = 'artista_id';
    protected $fillable = [
        'nome'
    ];

    /**
     * Define a relação inversa de Muitos para 1 (N:1).
     * Várias músicas pertencem a um único álbum.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function albuns()
    {
        return $this->hasMany(Album::class, 'artista_id');
    }

}