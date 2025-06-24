{{-- resources/views/pessoas/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Pessoa')

@section('content')
    <!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Pessoa</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
 

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

    form {
      background-color: #ffffff;
      padding: 25px;
      border-radius: 10px;
      max-width: 500px;
      width: 90%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .button {
      width: 100%;
      padding: 12px;
      background-color: #ff7a00;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #45a049;
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
    <form action="{{ route('pessoas.update', $pessoa->id_pessoa) }}" method="POST" novalidate>
      @csrf
      @method('PUT')

      <h2 class="text-center mb-4">Editar Pessoa</h2>

      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $pessoa->nome) }}" maxlength="50" required />
        @error('nome')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="sobrenome" class="form-label">Sobrenome</label>
        <input type="text" class="form-control @error('sobrenome') is-invalid @enderror" id="sobrenome" name="sobrenome" value="{{ old('sobrenome', $pessoa->sobrenome) }}" maxlength="50" required />
        @error('sobrenome')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf', $pessoa->cpf) }}" maxlength="11" minlength="11" required />
        @error('cpf')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
          <option value="">Selecione o tipo</option>
          <option value="APICULTOR" {{ old('tipo', $pessoa->tipo) === 'APICULTOR' ? 'selected' : '' }}>APICULTOR</option>
          <option value="RESPONSAVEL" {{ old('tipo', $pessoa->tipo) === 'RESPONSAVEL' ? 'selected' : '' }}>RESPONSAVEL</option>
        </select>
        @error('tipo')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="button">Atualizar</button>

      <div class="text-center mt-3">
        <a href="{{ route('pessoas.show', $pessoa->id_pessoa) }}" class="btn btn-link">Cancelar</a>
      </div>
    </form>
  </div>
</body>
</html>
@endsection
