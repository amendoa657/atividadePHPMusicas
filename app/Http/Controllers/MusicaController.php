<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    /**
     * Exibe a listagem de todas as músicas.
     */
    public function index()
    {
        // Eloquent: Busca todas as músicas carregando os dados do álbum correspondente (belongsTo)
        $musicas = Musica::with('album')->get();

        return view('musicas.index', compact('musicas'));
    }

    /**
     * Mostra o formulário para adicionar uma nova música.
     * Regra de Negócio: Precisamos listar todos os álbuns para o <select> no formulário.
     */
    public function create()
    {
        // Busca todos os álbuns do banco de dados
        $albuns = Album::all();

        // Passa a lista de álbuns para preencher o select do formulário Blade
        return view('musicas.create', compact('albuns'));
    }

    /**
     * Salva a nova música no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação simples dos dados enviados no formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'duracao' => 'required|string|max:10', // Exemplo: "3:45"
            'album_id' => 'required|exists:albuns,id', // Verifica se o ID do álbum realmente existe na tabela 'albuns'
        ]);

        // Eloquent: Salva a nova música no banco
        $musica = Musica::create($request->all());

        // Redireciona o usuário para a página de detalhes do álbum ao qual a música foi associada
        return redirect()->route('albuns.show', $musica->album_id)
                         ->with('sucesso', 'Música adicionada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma música específica (opcional, redireciona para o álbum).
     */
    public function show($id)
    {
        // Busca a música
        $musica = Musica::findOrFail($id);

        // Como a música faz parte de um álbum, redirecionamos o aluno para os detalhes do respectivo álbum
        return redirect()->route('albuns.show', $musica->album_id);
    }

    /**
     * Remove uma música do banco de dados.
     */
    public function destroy($id)
    {
        // Eloquent: Busca a música e a remove
        $musica = Musica::findOrFail($id);
        $albumId = $musica->album_id; // Guarda o ID do álbum para redirecionar depois
        $musica->delete();

        // Redireciona de volta para a página de detalhes do álbum correspondente
        return redirect()->route('albuns.show', $albumId)
                         ->with('sucesso', 'Música removida com sucesso!');
    }
}
