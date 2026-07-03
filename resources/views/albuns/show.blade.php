@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('albuns.index') }}" class="btn btn-secondary">← Voltar para Álbuns</a>
        <!-- Passamos o ID do álbum como parâmetro na rota para pré-selecionar no select de músicas -->
        <a href="{{ route('musicas.create', ['album_id' => $album->id]) }}" class="btn btn-primary">+ Adicionar Música</a>
    </div>

    <!-- Cabeçalho de Detalhes do Álbum -->
    <div class="album-header-detail">
        <div class="album-header-img">
            @if ($album->capa_url)
                <img src="{{ $album->capa_url }}" alt="Capa de {{ $album->titulo }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
            @else
                💿
            @endif
        </div>
        <div class="album-header-info">
            <span class="album-header-tag">Álbum</span>
            <h1 style="margin-bottom: 8px; font-size: 2.5rem; -webkit-text-fill-color: initial; background: none; color: var(--text-color);">
                {{ $album->titulo }}
            </h1>
            <p style="font-size: 1.1rem; font-weight: 500;">Ano de Lançamento: {{ $album->ano }}</p>
            <p style="margin-top: 10px; font-size: 0.9rem;">
                Total de faixas: {{ $album->musicas->count() }}
            </p>
        </div>
    </div>

    <!-- Seção de Músicas -->
    <h2>Faixas do Álbum</h2>
    
    <!-- Relacionamento 1:N no Blade -->
    <!-- Acessamos $album->musicas, que retorna a coleção de músicas associadas graças à relação hasMany definida no Model -->
    @if ($album->musicas->isEmpty())
        <div style="background-color: var(--card-bg); border: 1px solid var(--border-color); padding: 30px; text-align: center; border-radius: 12px; margin-top: 15px;">
            <p style="margin-bottom: 15px;">Este álbum ainda não possui nenhuma música cadastrada.</p>
            <a href="{{ route('musicas.create', ['album_id' => $album->id]) }}" class="btn btn-secondary btn-sm" style="font-size: 0.85rem;">Cadastrar Primeira Música</a>
        </div>
    @else
        <div class="songs-list">
            @foreach ($album->musicas as $index => $musica)
                <div class="song-item">
                    <div class="song-details">
                        <!-- Índice da música (1, 2, 3...) -->
                        <span class="song-index">{{ $index + 1 }}</span>
                        <div>
                            <span class="song-title">{{ $musica->titulo }}</span>
                        </div>
                    </div>
                    
                    <div class="song-meta">
                        <!-- Duração da música -->
                        <span class="song-duration">{{ $musica->duracao }}</span>
                        
                        <!-- Formulário para exclusão da música -->
                        <form action="{{ route('musicas.destroy', $musica->id) }}" method="POST" onsubmit="return confirm('Deseja realmente remover esta música?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 4px 8px; font-size: 0.75rem; border-radius: 4px;">Excluir</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
