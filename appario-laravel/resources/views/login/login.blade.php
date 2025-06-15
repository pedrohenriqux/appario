<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login - Projeto</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS personalizado -->
        <link href="nav.css" rel="stylesheet">
        </head>

        <style>
                * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            /* Fundo da página */
            body {
                background-color: #f2f2f2;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Container do formulário */
            .login-container {
                background-color: white;
                padding: 30px 40px;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                width: 100%;
                max-width: 400px;
            }

            /* Título */
            .login-container h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
            }

            /* Labels e inputs */
            form label {
                display: block;
                margin-bottom: 5px;
                color: #555;
                font-weight: bold;
            }

            form input {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 5px;
                border: 1px solid #ccc;
                transition: border-color 0.3s;
                }

            form input:focus {
                border-color: #ff7a00;
                outline: none;
            }

            /* Botão */
            form button {
                width: 100%;
                padding: 12px;
                background-color: #ff7a00;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            form button:hover {
                background-color: #e06c00;
            }
        </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <img src="logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top me-2">
                <span class="text-white fw-bold">Login</span>
            </div>
        </nav>
        <div class="login-container">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"required />
                @error('email')
                    <div style="color:red;">{{ $message }}</div>
                @enderror

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required />
                @error('password')
                    <div style="color:red;">{{ $message }}</div>
                @enderror

                <button type="submit">Entrar</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
