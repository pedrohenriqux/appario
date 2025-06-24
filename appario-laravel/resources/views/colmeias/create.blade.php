<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Colmeia</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('css/nav.css') }}" rel="stylesheet" />

  <style>
    /* Reaproveitando o estilo da view de apiário */
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
      max-width: 760px;
      width: 90%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
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
    <header>
        <div class="logo-container">
        <img src="{{ asset('img/appAriologo.png') }}" alt="Logo Appário" />
        </div>
        <nav class="nav-menu">
        <a href="{{ url('/dashboard') }}">HOME</a>
        <a href="{{ route('apiarios.index') }}">APIÁRIO</a>
        <a href="{{ route('colmeias.index') }}">COLMEIA</a>
        <a href="{{ route('inspecao.index') }}">INSPEÇÃO</a>
        </nav>
    </header>

    <div class="form-wrapper">
        <form method="POST" action="{{ route('colmeias.store') }}">
          @csrf
          <h1 class="text-center mb-4">Informe os dados da Colmeia</h1>

          {{-- Espécie --}}
          <div>
              <label for="especie">Espécie<span style="color: red">*</span></label>
              <input type="text" class="form-control @error('especie') is-invalid @enderror" name="especie" id="especie" value="{{ old('especie') }}" required />
              @error('especie')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          {{-- Tamanho --}}
          <div>
              <label for="tamanho">Tamanho<span style="color: red">*</span></label>
              <input type="text" class="form-control @error('tamanho') is-invalid @enderror" name="tamanho" id="tamanho" value="{{ old('tamanho') }}" required />
              @error('tamanho')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          {{-- Data Aquisição --}}
          <div class="mb-3">
              <label for="data_aquisicao">Data de Aquisição<span style="color: red">*</span></label>
              <input type="date" class="form-control @error('data_aquisicao') is-invalid @enderror" id="data_aquisicao" name="data_aquisicao" value="{{ old('data_aquisicao') }}" required />
              @error('data_aquisicao')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          {{-- Apiário --}}
          <div>
              <label for="apiario_id" class="form-label">Apiário<span style="color: red">*</span></label>
              <select class="form-select @error('apiario_id') is-invalid @enderror" id="apiario_id" name="apiario_id" required>
                  <option value="">Selecione...</option>
                  @foreach($apiarios as $apiario)
                      <option value="{{ $apiario->id_apiario }}" {{ old('apiario_id') == $apiario->id_apiario ? 'selected' : '' }}>
                          {{ $apiario->nome }}
                      </option>
                  @endforeach
              </select>
              @error('apiario_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <button type="submit" class="button">Cadastrar</button>
        </form>
    </div>
</body>
</html>
