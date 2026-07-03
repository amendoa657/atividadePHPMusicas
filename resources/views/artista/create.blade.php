@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 30px;">
        <a href="{{ route('artista.index') }}" class="btn btn-secondary">← Voltar para Artistas</a>
    </div>

    <!-- Card de Formulário -->
    <div class="card-form">
        <h2 style="margin-bottom: 5px;">Cadastrar Novo Artista</h2>
        <p style="margin-bottom: 25px;">Insira as informações do artista abaixo.</p>

        <!-- Formulário apontando para a rota correta do ArtistaController -->
        <form action="{{ route('artista.store') }}" method="POST">
            @csrf

            <!-- Campo: Nome -->
            <div class="form-group">
                <label for="nome">Nome do Artista *</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Pink Floyd" value="{{ old('nome') }}" required>
                
                {{-- Captura o erro correto baseado no nome do campo no banco --}}
                @error('nome')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ações -->
            <div class="form-actions">
                <a href="{{ route('albuns.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar Artista</button>
            </div>
        </form>
    </div>
@endsection