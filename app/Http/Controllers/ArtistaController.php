<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    /**
     * Exibe a listagem de todos os artistas.
     */
    public function index()
    {
        $artistas = Artista::all();
        return view('artista.index', compact('artistas'));
    }

    /**
     * Mostra o formulário para criar um novo artista.
     */
    public function create()
    {
        return view('artista.create');
    }

    /**
     * Salva o novo artista no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        Artista::create($request->all());

        return redirect()->route('artista.index')->with('sucesso', 'Artista cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um artista específico e seus álbuns.
     */
    public function show($id)
    {
        // Eager Loading: Carrega o artista trazendo junto todos os seus álbuns
        $artista = Artista::with('albuns')->findOrFail($id);

        return view('artista.show', compact('artista'));
    }

    /**
     * Remove o artista do banco de dados.
     */
    public function destroy()
    {
        
    }
}
