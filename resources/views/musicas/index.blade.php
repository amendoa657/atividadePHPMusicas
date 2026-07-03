@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1>Todas as Músicas</h1>
            <p>Lista completa de faixas de todos os álbuns cadastrados.</p>
        </div>
        <a href="{{ route('musicas.create') }}" class="btn btn-primary">Adicionar Música</a>
    </div>

    <!-- Verifica se existem músicas cadastradas -->
    @if ($musicas->isEmpty())
        <div style="background-color: var(--card-bg); border: 1px solid var(--border-color); padding: 40px; text-align: center; border-radius: 12px; margin-top: 20px;">
            <div style="font-size: 3rem; margin-bottom: 15px;">🎵</div>
            <h2>Nenhuma música por aqui...</h2>
            <p style="margin-bottom: 20px;">Adicione uma música a um dos seus álbuns cadastrados.</p>
            <a href="{{ route('musicas.create') }}" class="btn btn-primary">Adicionar Primeira Música</a>
        </div>
    @else
        <!-- Lista Geral de Músicas -->
        <div class="songs-list">
            @foreach ($musicas as $index => $musica)
                <div class="song-item">
                    <div class="song-details">
                        <span class="song-index">{{ $index + 1 }}</span>
                        <div>
                            <!-- Título da música -->
                            <span class="song-title">{{ $musica->titulo }}</span>
                            <!-- Álbum ao qual pertence (usando a relação belongsTo) -->
                            <div class="song-album-info">
                                Álbum: 
                                @if ($musica->album)
                                    <!-- Link para ir aos detalhes do álbum -->
                                    <a href="{{ route('albuns.show', $musica->album->id) }}" style="color: var(--primary); text-decoration: none; font-weight: 500;">
                                        {{ $musica->album->titulo }}
                                    </a>
                                @else
                                    <span style="color: var(--text-muted);">Sem Álbum</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="song-meta">
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
