<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" href="{{ asset('favicon-32x32.png') }}" type="image/x-icon" />

  <!-- CSS personalizado -->
  <link href="nav.css" rel="stylesheet">
    <title>Document</title>
    <style>
    .navbar-custom {
        background-color: #f5c802; /* tom de laranja */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 100%;
        position: fixed; /* Fixa a barra de navegação no topo */
        top : 0; /* Posiciona no topo da página */

    }
    .navbar-title {
        color: #ffffff; /* Cor do texto */
        position: absolute;
        left: 50%;
        font-size: 48px; /* Tamanho da fonte */
        transform: translate(-50%); /* Centraliza o texto */
        text-align: center; /* Espaçamento à esquerda */
        font-weight: bold;
        flex-grow: 1;
    }

    body {
        background-color:rgb(242, 242, 242);
        background-image: url('{{ asset("img/backgroudimg.png") }}');
        background-repeat: no-repeat; 
        background-size: cover; /
        background-position: center; 
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    form {
        background-color:rgb(255, 255, 255);
        padding: 25px;
        border-radius: 10px;
        max-width: 400px;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 120px; /* Adds space below the fixed navbar */
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
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
        background-color: #ff7a00;      /* Laranja forte */
        color: white;
        font-size: 16px;
        font-weight: bold;              /* Deixa a fonte em negrito */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <img src="{{ asset('img/appAriologo.png') }}" alt="Logo Appário" width="60" height="60" class="d-inline-block align-text-top me-2">
            <h1 class="navbar-title m-0">CADASTRO</h1>
        </div>
    </nav>

        <form method="POST" action="{{ route('usuarios.store') }}" class="w-100 px-3 px-sm-5" style="max-width: 800px;">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3 class="mb-3 text-center text-uppercase">Cadastro de Usuário</h3>
            <a href="{{ route('login.form') }}">Já tenho conta</a>

            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="email">Seu Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label for="nome">Seu Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Digite seu nome">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="password">Sua Senha</label>
                    <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label for="sobrenome">Seu Sobrenome</label>
                    <input type="text" name="sobrenome" class="form-control" placeholder="Digite seu sobrenome">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="password_confirmation">Confirme sua senha</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua senha" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label for="cpf">Seu CPF</label>
                    <input type="text" name="cpf" maxlength="11" class="form-control">
                </div>

                <div class="col-12 mt-3">
                    <label for="tipo">Função</label>
                    <select name="tipo" class="form-select" required>
                        <option value="">Selecione...</option>
                        <option value="APICULTOR">APICULTOR</option>
                        <option value="RESPONSAVEL">RESPONSAVEL</option>
                    </select>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="button w-100">Cadastrar</button>
                </div>
            </div>
        </form>

  </body>
</html>