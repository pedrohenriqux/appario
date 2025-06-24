@extends('layouts.app')

@section('title', 'Apiários')

@section('content')
  <style>
    .page-title {
      font-size: 1rem;
      margin: 1rem 2rem;
      font-weight: 500;
    }

    .apiario-card {
      background-color: #f1f1f1;
      margin: 0.5rem 2rem;
      padding: 1rem 1.5rem;
      border-radius: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      flex-wrap: wrap;
      transition: background-color 0.2s ease;
    }

    .apiario-card:hover {
      background-color: #e0e0e0;
      cursor: pointer;
    }

    .apiario-info {
      display: flex;
      flex-direction: column;
    }

    .apiario-nome {
      font-size: 1.2rem;
      font-weight: bold;
      color: #f8b400;
    }

    .apiario-local {
      font-size: 1rem;
      color: #333;
    }

    .apiario-tipo {
      font-size: 0.95rem;
      color: #222;
      text-align: right;
    }

    .empty-message {
      text-align: center;
      margin-top: 2rem;
      font-size: 1.2rem;
      color: #999;
    }

    .add-button {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      background-color: #f8b400;
      color: white;
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      font-size: 2rem;
      line-height: 1;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
      cursor: pointer;
      z-index: 10;
    }

    @media (max-width: 576px) {
      .apiario-card {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .apiario-tipo, .apiario-actions {
        text-align: left;
        width: 100%;
      }

      .add-button {
        bottom: 1rem;
        right: 1rem;
        width: 45px;
        height: 45px;
        font-size: 1.8rem;
      }
    }

    .card-link {
      text-decoration: none;
      color: inherit;
      width: 100%;
    }
  </style>

  <div class="page-title">Apiários já adicionados</div>
        <a href="{{ route('apiarios.relatorio') }}" target="_blank" class="btn btn-warning"
            style="position: fixed; bottom: 2rem; right: 6rem; z-index: 10; padding: 12px 16px; border-radius: 8px; font-weight: 600;">
                📄 Gerar Relatório
        </a>

  @if($apiarios->count() > 0)
    @foreach($apiarios as $apiario)
      <div onclick="window.location='{{ route('apiarios.mostrar', $apiario->id_apiario) }}'" class="apiario-card">
        <div class="apiario-info">
          <div class="apiario-nome">Apiário {{ $apiario->id_apiario }}</div>
          <div class="apiario-local">{{ $apiario->nome }}</div>
        </div>
        <div class="apiario-tipo">
          {{ $apiario->enderecos->cidade ?? 'Sem cidade' }}<br>
           Colmeias: {{ $apiario->colmeias_count }}
        </div>

        {{-- Botões de ação --}}
        <div style="display: flex; gap: 0.5rem; margin-top: 0.5rem;" onclick="event.stopPropagation();">
          <a href="{{ route('apiarios.edit', $apiario->id_apiario) }}" class="btn btn-sm btn-primary">Editar</a>

          <form action="{{ route('apiarios.destroy', $apiario->id_apiario) }}" method="POST" onsubmit="event.stopPropagation(); return confirm('Deseja realmente excluir este apiário?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
          </form>
        </div>
      </div>
    @endforeach
  @else
    <div class="empty-message">Nenhum apiário cadastrado</div>
  @endif

  <a href="{{ route('apiarios.adicionar') }}" class="add-button">+</a>
@endsection
