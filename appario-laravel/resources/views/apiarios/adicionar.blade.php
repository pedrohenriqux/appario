<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Apiário</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="nav.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f2f2f2;
      background-image: url('{{ asset('img/backgroundImg.png') }}');
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
      <a href="{{ route('colmeia.index') }}">COLMEIA</a>
      <a href="{{ route('inspecao.index') }}">INSPEÇÃO</a>
    </nav>
  </header>

  <div class="form-wrapper">
    <form method="POST" action="{{ route('apiarios.store') }}">
      @csrf
      <h1 class="text-center mb-4">Informe os dados do Apiário</h1>

      <div>
        <label for="nome">Nome do Apiário</label>
        <input type="text" name="nome" required />
      </div>

      
    <div>
        <h3>Localização</h3>
        <label for="estado" class="form-label">Estado (UF)</label>
        <select class="form-select" id="estado" name="estado" required>
          <option value="">Selecione...</option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
    </div>

      <!-- Cidade -->
      <div class="mb-3">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" required />
      </div>

      <!-- Logradouro -->
      <div class="mb-3">
        <label for="logradouro" class="form-label">Logradouro(Sítio,Bairro,etc.)</label>
        <input type="text" class="form-control" id="logradouro" name="logradouro" required />
      </div>
      

    <div>
        <label for="tipo">Tipo de Apiário</label>
        <select name="tipo" required>
          <option value="">Selecione...</option>
          <option value="fixo">FIXO</option>
          <option value="migratório">MIGRATÓRIO</option>
        </select>
      </div>

      <button type="submit" class="button">Cadastrar</button>
    </form>
  </div>
</body>
</html>
