<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Apiário</title>

  <!-- Bootstrap CSS -->
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
      padding-top: 90px; /* espaço para o header fixo */
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
        <a href="{{ url('/') }}">HOME</a>
        <a href="{{ route('apiarios.index') }}">APIÁRIO</a>
        <a href="{{ route('colmeias.index') }}">COLMEIA</a>
        <a href="{{ route('inspecao.index') }}">INSPEÇÃO</a>
        </nav>
    </header>

    <div class="form-wrapper">
        <form method="POST" action="{{ route('apiarios.store') }}">
        @csrf
        <h1 class="text-center mb-4">Informe os dados do Apiário</h1>

                {{-- Nome --}}
            <div>
                <label for="nome">Nome do Apiário<span style="color: red">*</span></label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" value="{{ old('nome') }}" required />
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="data_criacao">Data de Criação<span style="color: red">*</span></label>
                <input type="date" class="form-control @error('data_criacao') is-invalid @enderror" id="data_criacao" name="data_criacao" value="{{ old('data_criacao') }}" required />
                @error('data_criacao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Área --}}
            <div class="mb-3">
                <label for="area">Área (hectare)<span style="color: red">*</span></label>
                <input type="number" step="0.01" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area') }}" required />
                @error('area')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Coordenadas --}}
            <div class="mb-3">
                <label for="coordenadas">Coordenadas (GPS)</label>
                <input type="text" class="form-control @error('coordenadas') is-invalid @enderror" id="coordenadas" name="coordenadas" value="{{ old('coordenadas') }}"/>
                @error('coordenadas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <h3>Localização</h3>
            {{-- Estado --}}
            <div>
                <label for="estado" class="form-label">Estado (UF)<span style="color: red">*</span></label>
                <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                    <option value="">Selecione...</option>
                    @foreach($ufs as $sigla => $nome)
                        <option value="{{ $sigla }}" {{ old('estado') == $sigla ? 'selected' : '' }}>
                            {{ $nome }}
                        </option>
                    @endforeach
                </select>
                @error('estado')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cidade -->
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade<span style="color: red">*</span></label>
                <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade" value="{{ old('cidade') }}" required />
                @error('cidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Logradouro -->
            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro<span style="color: red">*</span></label>
                <input type="text" class="form-control @error('logradouro') is-invalid @enderror" id="logradouro" name="logradouro" value="{{ old('logradouro') }}"  required/>
                @error('logradouro')
                    <div style="color:red;">{{ $message }}</div>
                @enderror      
            </div>

            {{-- Número --}}
            <div class="mb-3">
                <label for="numero">Número<span style="color: red">*</span></label>
                <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" value="{{ old('numero') }}" required />
                @error('numero')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Complemento --}}
            <div class="mb-3">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control @error('complemento') is-invalid @enderror" id="complemento" name="complemento" value="{{ old('complemento') }}" />
                @error('complemento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bairro --}}
            <div class="mb-3">
                <label for="bairro">Bairro<span style="color: red">*</span></label>
                <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro" value="{{ old('bairro') }}" required />
                @error('bairro')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- CEP --}}
            <div class="mb-3">
                <label for="cep">CEP<span style="color: red">*</span></label>
                <input type="text" class="form-control @error('cep') is-invalid @enderror" id="cep" name="cep" value="{{ old('cep') }}" required maxlength="10" />
                @error('cep')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <!--
            <div>
                <label for="tipo">Tipo de Apiário</label>
                <select name="tipo" required>
                <option value="">Selecione...</option>
                <option value="fixo">FIXO</option>
                <option value="migratório">MIGRATÓRIO</option>
                </select>
            </div>
            -->
            <button type="submit" class="button">Cadastrar</button>
        </form>
    </div>
</body>
</html>
