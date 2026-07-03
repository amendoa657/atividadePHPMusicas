<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicaController;

// Redireciona a página raiz para a listagem de álbuns
Route::get('/', function () {
    return redirect()->route('albuns.index');
});

// Rotas do tipo Resource para Álbuns e Músicas
// Isso cria automaticamente rotas para index, create, store, show, edit, update, destroy
Route::resource('albuns', AlbumController::class);
Route::resource('musicas', MusicaController::class);    