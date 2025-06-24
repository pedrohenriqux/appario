@extends('layouts.app')

@section('title', 'Dashboard - Appário')

@section('content')
  <div class="dashboard-container">
    <a href="{{ route('colmeias.index') }}" class="dashboard-card">
      <h2>COLMEIAS</h2>
      <img src="{{ asset('img/favosDemel.png') }}" alt="Colmeias" />
    </a>
    <a href="{{ route('apiarios.index') }}" class="dashboard-card">
      <h2>APIÁRIOS</h2>
      <img src="{{ asset('img/apiarioPng.png') }}" alt="Apiários" />
    </a>
    <a href="{{ route('inspecao.index') }}" class="dashboard-card">
      <h2>INSPEÇÕES</h2>
      <img src="{{ asset('img/favosPng.png') }}" alt="Inspeções" />
    </a>
    <a href="{{ route('apicultor.index') }}" class="dashboard-card">
      <h2>APICULTOR</h2>
      <img src="{{ asset('img/apicultorPng.png') }}" alt="Apicultor" />
    </a>
  </div>

  <style>
    .dashboard-container {
      position: relative;
      z-index: 1;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.5rem;
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .dashboard-card {
      background-color: #f5f5f5;
      border-radius: 15px;
      padding: 1.5rem;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 220px;
      cursor: pointer;
      text-decoration: none;
      color: inherit;
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
    }

    .dashboard-card h2 {
      color: #f8b400;
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    .dashboard-card img {
      width: 100%;
      max-width: 120px;
      height: auto;
      object-fit: contain;
    }

    @media (min-width: 1200px) {
      .dashboard-container {
        grid-template-columns: repeat(2, 1fr);
      }

      .dashboard-card {
        min-height: 250px;
      }

      .dashboard-card h2 {
        font-size: 1.6rem;
      }

      .dashboard-card img {
        max-width: 140px;
      }
    }

    @media (max-width: 768px) {
      .dashboard-container {
        padding: 1rem;
        gap: 1rem;
      }

      .dashboard-card {
        min-height: 130px;
        padding: 0.8rem;
      }

      .dashboard-card h2 {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
      }

      .dashboard-card img {
        max-width: 60px;
      }
    }
  </style>
@endsection
