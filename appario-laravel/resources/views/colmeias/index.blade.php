@extends('layouts.app')

@section('title', 'Colmeias')

@section('content')
  <style>
    .page-title {
      font-size: 1rem;
      margin: 1rem 2rem;
      font-weight: 500;
    }

    .colmeia-card {
      background-color: #f1f1f1;
      margin: 0.5rem 2rem;
      padding: 1rem 1.5rem;
      border-radius: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      flex-wrap: wrap;
    }

    .colmeia-info {
      display: flex;
      flex-direction: column;
    }

    .colmeia-especie {
      font-size: 1.2rem;
      font-weight: bold;
      color: #f8b400;
    }

    .colmeia-detalhes {
      font-size: 1rem;
      color: #333;
    }

    .colmeia-apiario {
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
      .colmeia-card {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .colmeia-apiario {
        text-align: left;
      }

      .add-button {
        bottom: 1rem;
        right: 1rem;
        width: 45px;
        height: 45px;
        font-size: 1.8rem;
      }
    }
  </style>

  <div class="page-title">Colmeias já cadastradas</div>
        <a href="{{ route('colmeias.relatorio') }}" target="_blank" class="btn btn-warning"
            style="position: fixed; bottom: 2rem; right: 6rem; z-index: 10; padding: 12px 16px; border-radius: 8px; font-weight: 600;">
                📄 Gerar Relatório
        </a>

  @if($colmeias->count() > 0)
    @foreach($colmeias as $colmeia)
      <div class="colmeia-card">
        <div class="colmeia-info">
            <div class="colmeia-especie">{{ $colmeia->especie }}</div>
            <div class="colmeia-detalhes">
              Tamanho: {{ $colmeia->tamanho }}<br>
              Aquisição: {{ \Carbon\Carbon::parse($colmeia->data_aquisicao)->format('d/m/Y') }}
            </div>
        </div>
        <div class="colmeia-apiario">
            Apiário: {{ $colmeia->apiario->nome ?? 'Sem apiário' }}
        </div>
      </div>
    @endforeach
  @else
    <div class="empty-message">Nenhuma colmeia cadastrada</div>
  @endif

  <a href="{{ route('colmeias.create') }}" class="add-button">+</a>

@endsection
