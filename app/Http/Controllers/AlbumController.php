<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Exibe a listagem de todos os álbuns.
     */
    public function index()
    {
        // Eloquent: Busca todos os registros da tabela 'albuns'
        $albuns = Album::all();

        // Retorna a view 'albuns.index' passando a lista de álbuns para o Blade
        return view('albuns.index', compact('albuns'));
    }

    /**
     * Mostra o formulário para criar um novo álbum.
     */
    public function create()
    {
        // Retorna a view onde está o formulário de cadastro
        return view('albuns.create');
    }

    /**
     * Salva o novo álbum no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação simples dos dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'capa_url' => 'nullable|url', // A URL da imagem é opcional
        ]);

        // Eloquent: Salva o novo álbum no banco usando o Mass Assignment (configurado via $fillable)
        Album::create($request->all());

        // Redireciona o usuário de volta para a lista de álbuns com uma mensagem na sessão
        return redirect()->route('albuns.index')->with('sucesso', 'Álbum cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um álbum específico, incluindo suas músicas associadas.
     */
    public function show($id)
    {
        // Eloquent: Busca o álbum com o ID informado, ou retorna erro 404 caso não exista.
        // O método with('musicas') carrega as músicas associadas antecipadamente (Eager Loading),
        // otimizando as consultas ao banco de dados.
        $album = Album::with('musicas')->findOrFail($id);

        // Retorna a tela de detalhes enviando o objeto de álbum
        return view('albuns.show', compact('album'));
    }

    /**
     * Remove o álbum do banco de dados.
     */
    public function destroy($id)
    {
        // Eloquent: Busca o álbum e realiza a exclusão
        $album = Album::findOrFail($id);
        $album->delete(); // Devido ao cascadeOnDelete na migração, as músicas deste álbum são deletadas juntas automaticamente

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->route('albuns.index')->with('sucesso', 'Álbum e suas faixas foram excluídos!');
    }
}
