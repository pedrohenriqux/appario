{{-- resources/views/pessoas/destroy.blade.php --}}
@extends('layouts.app')

@section('title', 'Confirmar Exclusão')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirmar Exclusão</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('css/nav.css') }}" rel="stylesheet" />

  <style>
    body {
      background-color: #f2f2f2;
      background-image: url("{{ asset('img/backgroundImg.png') }}");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      margin: 0;
      padding-top: 90px;
    }

    header {
      background-color: #f8b400;
      padding: 1rem 3rem;
      color: white;
      font-weight: 600;
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      height: 70px;
    }

    .logo-container {
      justify-self: start;
    }

    .logo-container img {
      height: 50px;
    }

    .nav-menu {
      justify-self: center;
      display: flex;
      gap: 2rem;
      align-items: center;
    }

    .nav-menu a {
      color: white;
      text-decoration: none;
      font-size: clamp(1.4rem, 3vw, 2.2rem);
      font-weight: 600;
    }

    .nav-menu a:hover {
      text-decoration: underline;
    }

    .form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 90px);
      flex-direction: column;
    }

    .confirm-box {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      max-width: 600px;
      width: 90%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      text-align: center;
    }

    .confirm-box h1 {
      color: #dc3545;
      margin-bottom: 20px;
    }

    .confirm-box p {
      font-size: 18px;
      margin-bottom: 25px;
    }

    .btn-confirm {
      background-color: #dc3545;
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      color: white;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    .btn-confirm:hover {
      background-color: #bd2130;
    }

    .btn-cancel {
      background-color: #ff7a00;
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      color: white;
      border-radius: 8px;
      margin-left: 10px;
      transition: background-color 0.3s ease;
    }

    .btn-cancel:hover {
      background-color: #e06c00;
    }

    @media (max-width: 768px) {
      header {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
      }

      .nav-menu {
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
      }
    }
  </style>
</head>
<body>
    <header class="header-custom">
        <div class="container-fluid header-content">
            <div class="header-left">
                <img src="{{ asset('img/appAriologo.png') }}" alt="Logo Appário" width="50" height="50">
            </div>        
        </div>
    </header>

  <div class="form-wrapper">
    <div class="confirm-box">
      <h1>Confirmar Exclusão</h1>
      <p>Tem certeza que deseja excluir o perfil de <strong>{{ $pessoa->nome }} {{ $pessoa->sobrenome }}</strong>?</p>

      <form action="{{ route('pessoas.destroy', $pessoa->id_pessoa) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-confirm">Sim, excluir</button>
        <a href="{{ route('pessoas.show', $pessoa->id_pessoa) }}" class="btn-cancel">Cancelar</a>
      </form>
    </div>
  </div>
</body>
</html>
@endsection
