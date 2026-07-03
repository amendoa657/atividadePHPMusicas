@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1>Álbuns Cadastrados</h1>
            <p>Explore a coleção ou adicione novos discos à lista.</p>
        </div>
        <!-- Link para a página de criação de novos álbuns -->
        <a href="{{ route('albuns.create') }}" class="btn btn-primary">Cadastrar Álbum</a>
    </div>

    <!-- Verifica se existem álbuns cadastrados -->
    @if ($albuns->isEmpty())
        <div style="background-color: var(--card-bg); border: 1px solid var(--border-color); padding: 40px; text-align: center; border-radius: 12px; margin-top: 20px;">
            <div style="font-size: 3rem; margin-bottom: 15px;">💿</div>
            <h2>Nenhum álbum por aqui...</h2>
            <p style="margin-bottom: 20px;">Comece cadastrando o seu primeiro álbum de música!</p>
            <a href="{{ route('albuns.create') }}" class="btn btn-primary">Cadastrar Primeiro Álbum</a>
        </div>
    @else
        <!-- Grid de Álbuns -->
        <div class="albums-grid">
            @foreach ($albuns as $album)
                <!-- Card de cada Álbum individual, clicável para ir ao show -->
                <div class="album-card">
                    <div class="album-img-container">
                        @if ($album->capa_url)
                            <!-- Exibe a imagem de capa se a URL existir -->
                            <img src="{{ $album->capa_url }}" alt="Capa de {{ $album->titulo }}" class="album-img">
                        @else
                            <!-- Placeholder caso não tenha imagem cadastrada -->
                            <div class="album-placeholder-img">💿</div>
                        @endif
                    </div>
                    
                    <div class="album-info">
                        <span class="album-title">{{ $album->titulo }}</span>
                        <span class="album-year">Lançamento: {{ $album->ano }}</span>
                        
                        <div style="display: flex; gap: 10px; margin-top: auto; justify-content: space-between; align-items: center;">
                            <!-- Link para visualizar detalhes do álbum (onde as músicas serão listadas) -->
                            <a href="{{ route('albuns.show', $album->id) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 0.8rem;">Ver Faixas</a>
                            
                            <!-- Formulário para exclusão rápida do álbum -->
                            <form action="{{ route('albuns.destroy', $album->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir este álbum e todas as suas músicas?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 0.8rem;">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
