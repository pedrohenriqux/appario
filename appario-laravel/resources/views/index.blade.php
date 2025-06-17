<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Protótipo Frontend</title>

  @vite(['resources/js/app.js'])
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1 class="mb-4">Protótipo de Telas</h1>
    <ul class="list-group">
      <li class="list-group-item">
        <a href="{{ url('login') }}">Tela de Login</a>
      </li>
      <li class="list-group-item">
        <a href="{{ url('dashboard') }}">Dashboard</a>
      </li>
      <li class="list-group-item">
        <a href="{{ url('formulario') }}">Formulário de Cadastro</a>
      </li>
    </ul>
  </div>
</body>
</html>
