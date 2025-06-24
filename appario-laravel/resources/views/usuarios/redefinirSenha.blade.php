<!DOCTYPE html>
<html lang="pt-br">
  <style>
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

  </style>
<head>
    <meta charset="UTF-8">
    <title>Nova Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="p-4 bg-white rounded shadow" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Definir nova senha</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('usuarios.atualizar') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <label for="password">Nova senha:</label>
            <input type="password" name="password" class="form-control mb-3" required>

            <label for="password_confirmation">Confirmar nova senha:</label>
            <input type="password" name="password_confirmation" class="form-control mb-3" required>

            @error('password')
                <div class="text-danger mb-2">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-warning w-100">Atualizar senha</button>
        </form>
    </div>
</body>
</html>
