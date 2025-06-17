<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
        background-color: #f2f2f2;
        background-image: url('background.jpg');
        background-repeat: no-repeat; /* Prevents the image from repeating */
        background-size: cover; /* Ensures the image covers the entire element */
        background-position: center; 
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
     }
    form {
        background-color: #ffffff;
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
            <img src="logo.jpg" alt="Logo" width="60" height="60" class="d-inline-block align-text-top me-2">
            <h1 class="navbar-title m-0">cadastro</h1>
        </div>
    </nav>
    <form method="POST" action="http://localhost:8000/index.php" class="w-100 px-3 px-sm-5">
      <h1>Faça o seu cadastro</h1>
      <div>
        <label for="Nome">Seu Nome</label>
        <input type="text" name="nome" />
      </div>
      <div>
        <label for="Sobrenome">Seu sobrenome</label>
        <input type="text" name="sobrenome" />
      </div>
      <div>
        <label for="Tipo">Função</label>
        <input type="text" name="tipo" />
      </div>
      <div>
        <label for="CPF">Seu CPF</label>
        <input type="text" name="cpf" />
      </div>
        <input type="hidden" name="classe" value="Pessoa">
        <input type="hidden" name="metodo" value="store">
        <button type="submit" class="button">Cadastrar</button>
    </form>
  </body>
</html>