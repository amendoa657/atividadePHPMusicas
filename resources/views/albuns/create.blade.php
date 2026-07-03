@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 30px;">
        <a href="{{ route('albuns.index') }}" class="btn btn-secondary">← Voltar para Álbuns</a>
    </div>

    <!-- Card de Formulário -->
    <div class="card-form">
        <h2 style="margin-bottom: 5px;">Cadastrar Novo Álbum</h2>
        <p style="margin-bottom: 25px;">Insira os dados do disco abaixo.</p>

        <!-- Formulário apontando para a rota de salvar (store) do AlbumController -->
        <form action="{{ route('albuns.store') }}" method="POST">
            <!-- Diretiva CSRF: Obrigatória em formulários Laravel para evitar ataques de falsificação de requisição -->
            @csrf

            <!-- Campo: Título -->
            <div class="form-group">
                <label for="titulo">Título do Álbum *</label>
                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ex: Dark Side of the Moon" value="{{ old('titulo') }}" required>
                {{-- Exibe a mensagem de erro caso a validação do campo falhar no Controller --}}
                @error('titulo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo: Ano de Lançamento -->
            <div class="form-group">
                <label for="ano">Ano de Lançamento *</label>
                <input type="number" id="ano" name="ano" class="form-control" placeholder="Ex: 1973" value="{{ old('ano') }}" required>
                @error('ano')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo: URL da Imagem da Capa (Opcional) -->
            <div class="form-group">
                <label for="capa_url">URL da Imagem da Capa (Opcional)</label>
                <input type="url" id="capa_url" name="capa_url" class="form-control" placeholder="Ex: https://link-da-imagem.com/capa.jpg" value="{{ old('capa_url') }}">
                @error('capa_url')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ações -->
            <div class="form-actions">
                <a href="{{ route('albuns.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar Álbum</button>
            </div>
        </form>
    </div>
@endsection
