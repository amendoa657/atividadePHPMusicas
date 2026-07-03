@extends('layouts.app')

@section('content')
    <!-- Cabeçalho da Listagem -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="margin: 0;">Artistas Cadastrados</h2>
            <p style="margin: 5px 0 0 0; color: #666;">Gerencie os artistas do seu sistema de música.</p>
        </div>
        <a href="{{ route('artista.create') }}" class="btn btn-primary">+ Novo Artista</a>
    </div>

    <!-- Mensagem de Feedback (Sucesso) do Controller -->
    @if(session('sucesso'))
        <div class="alert alert-success" style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
            {{ session('sucesso') }}
        </div>
    @endif

    <!-- Card com a Tabela -->
    <div class="card-table" style="background: #fff; border: 1px solid #dee2e6; border-radius: 8px; padding: 20px;">
        @if($artistas->isEmpty())
            <div style="text-align: center; padding: 40px 20px;">
                <p style="color: #888; font-size: 16px; margin: 0;">Nenhum artista cadastrado até o momento.</p>
            </div>
        @else
            <table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 2px solidrgb(0, 0, 0);">
                        <th style="padding: 12px; width: 10%; color: black;">ID</th>
                        <th style="padding: 12px; width: 60%; color: black;">Nome do Artista</th>
                        <th style="padding: 12px; width: 30%; color: black; text-align: right;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artistas as $artista)
                        <tr style="border-bottom: 1px solidrgb(0, 0, 0);">
                            <td style="padding: 12px; font-weight: bold; color: black;">#{{ $artista->id }}</td>
                            <td style="padding: 12px; color: black;">{{ $artista->nome }}</td>
                            <td style="padding: 12px; text-align: right;">
                                <a href="{{ route('artista.show', $artista->id) }}" class="btn btn-sm btn-info" style="margin-right: 5px; text-decoration: none;">Ver</a>

                                <a href="{{ route('artista.edit', $artista->id) }}" class="btn btn-sm btn-warning" style="margin-right: 5px; text-decoration: none;">Editar</a>

                                <form action="{{ route('artista.destroy', $artista->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Tem certeza que deseja remover este artista? Todos os álbuns vinculados a ele também podem ser afetados.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection