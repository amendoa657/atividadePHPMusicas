@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 30px;">
        <a href="{{ route('artista.index') }}" class="btn btn-secondary">← Voltar para a Lista</a>
    </div>

    <div class="card-profile" style="background: #fff; border: 1px solid #dee2e6; border-radius: 8px; padding: 30px; margin-bottom: 40px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <span style="color:rgb(0, 0, 0); text-transform: uppercase; font-size: 12px; font-weight: bold; letter-spacing: 1px;">Artista</span>
        <h1 style="margin: 5px 0 15px 0; color: #212529;">{{ $artista->nome }}</h1>
        <p style="margin: 0; color:rgb(0, 0, 0); font-size: 14px;">
            Cadastrado em: {{ $artista->created_at->format('d/m/Y H:i') }}
        </p>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <h3 style="margin: 0;">Álbuns deste Artista</h3>
        <a href="{{ route('albuns.create', ['artista_id' => $artista->id]) }}" class="btn btn-sm btn-primary">+ Adicionar Álbum</a>
    </div>

    <div class="card-table" style="background: #fff; border: 1px solid #dee2e6; border-radius: 8px; padding: 20px;">
        @if($artista->albuns->isEmpty())
            <div style="text-align: center; padding: 30px 10px;">
                <p style="color: #888; font-size: 15px; margin: 0;">Este artista ainda não possui álbuns cadastrados.</p>
            </div>
        @else
            <table class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 2px solid #dee2e6;">
                        <th style="padding: 12px; width: 15%;">Capa</th>
                        <th style="padding: 12px; width: 50%;">Título do Álbum</th>
                        <th style="padding: 12px; width: 20%;">Ano de Lançamento</th>
                        <th style="padding: 12px; width: 15%; text-align: right;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artista->albuns as $album)
                        <tr style="border-bottom: 1px solidrgb(0, 0, 0); vertical-align: middle;">
                            <td style="padding: 12px;">
                                @if($album->capa_url)
                                    <img src="{{ $album->capa_url }}" alt="Capa de {{ $album->titulo }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; color:rgb(0, 0, 0);">
                                @else
                                    <div style="width: 50px; height: 50px; background: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 10px; color:rgb(0, 0, 0); border: 1px solid #ddd; text-align: center;">Sem Capa</div>
                                @endif
                            </td>
                            <td style="padding: 12px; font-weight: 500; color:rgb(0, 0, 0);">
                                {{ $album->titulo }}
                            <td style="padding: 12px; color:rgb(0, 0, 0);">
                                {{ $album->ano }}
                            </td>
                            <td style="padding: 12px; text-align: right;">
                                <a href="{{ route('albuns.show', $album->id) }}" class="btn btn-sm btn-info" style="text-decoration: none;">Ver Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection