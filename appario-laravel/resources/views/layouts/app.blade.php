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
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

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
      position: relative;
      z-index: 10;
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

    .user-menu {
      flex-shrink: 0;
      position: relative;
      color: white;
    }

    .user-menu a {
      cursor: pointer;
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .dropdown-menu {
      min-width: 12rem;
      font-size: 1rem;
    }

    .dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    font-size: 1rem;
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

    main {
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      background-color: #fff;
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
      .user-menu a {
        font-size: 1.8rem;
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
      <a href="{{ route('dashboard') }}">INÍCIO</a>
      <a href="{{ route('apiarios.index') }}">APIÁRIO</a>
      <a href="{{ route('colmeias.index') }}">COLMEIA</a>
      <a href="{{ route('inspecao.index') }}">INSPEÇÃO</a>
    </nav>

    {{-- Ícone do usuário (aparece só em rotas específicas) --}}
    @auth
      @php
        $pessoa = auth()->user()->pessoa ?? null;
      @endphp

      @if ($pessoa && (Route::is('dashboard') || Route::is('colmeias.*') || Route::is('apiarios.*')))
        <div class="user-menu dropdown">
          <a href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" title="Menu do Usuário">
            <i class="bi bi-person-circle text-white" style="font-size: 2rem;"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userMenu">
            <li>
              <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('pessoas.show', $pessoa->id_pessoa) }}">
                <i class="bi bi-person-lines-fill"></i> Ver Perfil
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('pessoas.edit', $pessoa->id_pessoa) }}">
                <i class="bi bi-pencil-square"></i> Editar Perfil
              </a>
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item d-flex align-items-center gap-2" type="submit">
                  <i class="bi bi-box-arrow-right"></i> Sair
                </button>
              </form>
            </li>
            <li>
              <form method="POST" action="{{ route('pessoas.destroy', $pessoa->id_pessoa) }}" onsubmit="return confirm('Tem certeza que deseja deletar sua conta?');">
                @csrf
                @method('DELETE')
                <button class="dropdown-item d-flex align-items-center gap-2 text-danger" type="submit">
                  <i class="bi bi-trash3"></i> Deletar Conta
                </button>
              </form>
            </li>
          </ul>
        </div>
      @endif
    @endauth
  </header>

  <main class="py-4 position-relative z-1">
    @yield('content')
  </main>

  <img class="hex-background" src="{{ asset('img/backgroundImg.png') }}" alt="Fundo Hexágonos" />

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
