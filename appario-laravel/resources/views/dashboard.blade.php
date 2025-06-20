<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Appário</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
      background-color: #fff;
      min-height: 100vh;
      overflow-x: hidden;
    }

    header {
      background-color: #f8b400;
      width: 100%;
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo-container {
      flex-shrink: 0;
    }

    .logo-container img {
      height: 45px;
      width: auto;
      object-fit: contain;
    }

    .nav-menu {
      display: flex;
      gap: 2rem;
      align-items: center;
      justify-content: center;
      flex-grow: 1;
    }

    .nav-menu a {
      color: white;
      text-decoration: none;
      font-size: 2rem;
      font-weight: 600;
    }

    .nav-menu a:hover {
      text-decoration: underline;
    }

    .hex-background {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 100%;
      max-width: 500px;
      opacity: 0.15;
      z-index: 0;
      pointer-events: none;
    }

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

    /* Telas grandes */
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

    /* Responsividade para celulares */
    @media (max-width: 768px) {
      header {
        flex-direction: column;
        padding: 1rem;
        gap: 0.5rem;
      }

      .logo-container img {
        height: 30px;
      }

      .nav-menu {
        flex-wrap: wrap;
        gap: 1rem;
      }

      .nav-menu a {
        font-size: 0.9rem;
      }

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
</head>
<body>

  <!-- Cabeçalho -->
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

  <!-- Dashboard Cards -->
  <div class="dashboard-container">
    <a href="{{ route('colmeia.index') }}" class="dashboard-card">
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

  <!-- Fundo decorativo -->
  <img class="hex-background" src="{{ asset('img/backgroundImg.png') }}" alt="Fundo Hexágonos" />

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
