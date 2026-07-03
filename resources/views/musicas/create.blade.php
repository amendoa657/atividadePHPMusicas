@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 30px;">
        <!-- Retorna para o álbum específico se veio dele, ou para a listagem principal -->
        @if (request('album_id'))
            <a href="{{ route('albuns.show', request('album_id')) }}" class="btn btn-secondary">← Voltar para o Álbum</a>
        @else
            <a href="{{ route('albuns.index') }}" class="btn btn-secondary">← Voltar para Álbuns</a>
        @endif
    </div>

    <!-- Card de Formulário -->
    <div class="card-form">
        <h2 style="margin-bottom: 5px;">Adicionar Nova Música</h2>
        <p style="margin-bottom: 25px;">Cadastre uma faixa e associe-a a um álbum existente.</p>

        <!-- Formulário apontando para a rota store do MusicaController -->
        <form action="{{ route('musicas.store') }}" method="POST">
            <!-- Token CSRF essencial para a segurança de formulários no Laravel -->
            @csrf

            <!-- Campo: Título da Música -->
            <div class="form-group">
                <label for="titulo">Título da Música *</label>
                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ex: Time" value="{{ old('titulo') }}" required>
                @error('titulo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo: Duração -->
            <div class="form-group">
                <label for="duracao">Duração da Música *</label>
                <input type="text" id="duracao" name="duracao" class="form-control" placeholder="Ex: 6:53" value="{{ old('duracao') }}" required>
                @error('duracao')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo: Seleção do Álbum (Relacionamento 1:N) -->
            <div class="form-group">
                <label for="album_id">Álbum Associado *</label>
                <select id="album_id" name="album_id" class="form-control" required>
                    <option value="" disabled {{ !request('album_id') && !old('album_id') ? 'selected' : '' }}>Selecione um álbum...</option>
                    
                    <!-- Loop dinâmico nos álbuns passados pelo controller -->
                    @foreach ($albuns as $album)
                        <option value="{{ $album->id }}" 
                            {{-- Se o ID do álbum for igual ao passado via URL (request) ou pelo old(), ele fica pré-selecionado --}}
                            {{ (old('album_id') ?? request('album_id')) == $album->id ? 'selected' : '' }}>
                            {{ $album->titulo }} ({{ $album->ano }})
                        </option>
                    @endforeach
                </select>
                @error('album_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ações -->
            <div class="form-actions">
                @if (request('album_id'))
                    <a href="{{ route('albuns.show', request('album_id')) }}" class="btn btn-secondary">Cancelar</a>
                @else
                    <a href="{{ route('albuns.index') }}" class="btn btn-secondary">Cancelar</a>
                @endif
                <button type="submit" class="btn btn-primary">Adicionar Música</button>
            </div>
        </form>
    </div>
@endsection
