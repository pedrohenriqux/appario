{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Appário')</title>

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

  <main class="py-4 position-relative z-1">
    @yield('content')
  </main>

  <img class="hex-background" src="{{ asset('img/backgroundImg.png') }}" alt="Fundo Hexágonos" />

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
