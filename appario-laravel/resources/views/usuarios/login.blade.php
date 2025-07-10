<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login - Projeto</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('favicon-32x32.png') }}" type="image/x-icon" />

       
        </head>

        <style>
            header.header-custom {
                background-color: #f5c802;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                width: 100%;
                position: fixed;
                top: 0;
                z-index: 1000;
                padding: 10px 20px;
            }

            .header-content {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .header-left {
                display: flex;
                align-items: center;
            }

            .header-left img {
                margin-right: 10px;
            }

            .header-title {
                color: #ffffff;
                font-size: 30px;
                font-weight: bold;
                position: fixed;
                left: 47%;

            }
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            /* Fundo da página */
           body {
            background-color: #f2f2f2;
            background-image: url('{{ asset('img/backgroundImg.png') }}');
            background-repeat: no-repeat; /* Prevents the image from repeating */
            background-size: cover; /* Ensures the image covers the entire element */
            background-position: center; 
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
    <header class="header-custom">
        <div class="container-fluid header-content">
            <div class="header-left">
                <img src="{{ asset('img/appAriologo.png') }}" alt="Logo Appário" width="50" height="50">
            </div>
            <span class="header-title">Login</span>
        </div>
    </header>
        <div class="login-container">
            <h2>Login</h2>
            <a href="{{ route('usuarios.create') }}">Ainda não tenho conta</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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

                <div style="text-align:center; margin-top: 10px;">
                    <a href="{{ route('usuarios.solicitarSenha') }}">Esqueceu a senha?</a>
                </div>

                <button type="submit">Entrar</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
