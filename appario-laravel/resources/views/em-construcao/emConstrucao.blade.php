<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appário - Página em Construção</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ asset('favicon-32x32.png') }}" type="image/x-icon" />

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Montserrat", sans-serif;
            background-color: #fdf8f1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }

        header {
            background-color: #fcba11;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .logo img {
            height: 45px;
        }

        .btn-inicio {
            padding: 10px 18px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            background-color: white;
            color: #f19900;
            border: 2px solid white;
            text-transform: uppercase;
            transition: background-color 0.3s;
            font-size: 18px;
        }

        .btn-inicio:hover {
            background-color: #1a1a1a;
        }

        .hero {
            position: relative;
            background-image: url('{{ asset('img/backgroundImg.png') }}');
            background-size: cover;
            background-position: center;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            text-align: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            color: #1a1a1a;
            background-color: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .hero-content img {
            max-width: 100%;
            height: 280px;
            margin-bottom: 20px;
        }

        .hero-content h2 {
            font-size: 1.5em;
            margin: 0;
        }

        @media (max-width: 1024px) {
            .hero-content {
                max-width: 80%;
                border-radius: 20px;
            }
        }

        @media (max-width: 768px) {
            .hero-content {
                padding: 30px;
                max-width: 80%;
            }

            .hero-content img {
                height: 240px;
            }

            .hero-content h2 {
                font-size: 1.3em;
            }

            .btn-inicio {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .hero-content {
                padding: 20px;
            }

            .hero-content img {
                height: 200px;
            }

            .hero-content h2 {
                font-size: 1.1em;
            }

            .btn-inicio {
                font-size: 14px;
            }
        }

        @media (max-width: 400px) {
            .hero-content img {
                height: 180px;
            }

            .hero-content h2 {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/appAriologo.png') }}" alt="logo">
        </div>
        <a href="{{ route('dashboard') }}" class="btn-inicio">início</a>
    </header>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <img src="{{ asset('img/emConstrucao.png') }}" alt="Página em Construção">
            <h2>Página em Construção</h2>
        </div>
    </section>

    @include('footer.footer')
</body>
</html>
