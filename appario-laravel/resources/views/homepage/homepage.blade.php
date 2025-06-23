<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appário - Homepage</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
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

        .menu-toggle {
            display: none;
            font-size: 1.8rem;
            color: white;
            cursor: pointer;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn-criar, .btn-login {
            padding: 10px 18px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
            text-transform: uppercase;
        }

        .btn-criar {
            background-color: #f19900;
            color: white;
            border: 2px solid #f19900;
        }

        .btn-criar:hover {
            background-color: #1a1a1a;
        }

        .btn-login {
            background-color: white;
            color: #f19900;
            border: 2px solid white;
        }

        .btn-login:hover {
            background-color: #1a1a1a;
        }

        .hero {
            position: relative;
            background-image: url('{{ asset('img/backgroundImg.png') }}');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
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
            box-shadow: 0 0 20px rgba(0, 0, 0, 0, 1);
            max-width: 800px;
        }

        .hero-content h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        .hero-content h3 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 1.2em;
            margin-bottom: 30px;
            text-align: justify;
            padding-left: 50px;
            padding-right: 50px;
        }

        .hero-content a {
            font-size: 1.2em;
        }

        @media (max-width: 1024px) {
            .btn-criar, .btn-login {
                font-size: 18px;
            }

            .hero-content {
                padding: 20px 30px 40px;
                max-width: 80%;
                border-radius: 20px;
            }

            .hero-content h1 {
                font-size: 2.8em;
            }

            .hero-content h3 {
                font-size: 1.7em;
            }

            .hero-content p {
                font-size: 1.3em;
                text-align: justify;
                padding-left: 58px;
                padding-right: 58px;
            }

            .hero-content a {
                font-size: 20px;
            }
        }

        @media (max-width: 768px) {
            .nav-buttons {
                display: none;
                flex-direction: column;
                gap: 10px;
                background-color: #add8e6;
                position: absolute;
                top: 70px;
                right: 30px;
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
                z-index: 10;
            }

            .nav-buttons.show {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .hero-content h1 {
                font-size: 2.5em;
            }

            .hero-content h3 {
                font-size: 1.4em;
            }

            .hero-content p {
                font-size: 1.1em;
                padding-left: 15px;
                padding-right: 15px;
            }

            .hero-content a {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .nav-buttons a {
                font-size: 16px;
            }

            .hero-content {
                padding: 20px 20px 40px;
                max-width: 75%;
            }

            .hero-content h3 {
                font-size: 1.2em;
            }

            .hero-content p {
                font-size: 1em;
                padding-left: 32px;
                padding-right: 32px;
            }

            .hero-content a {
                font-size: 16px;
            }
        }

        @media (max-width: 400px) {
            .logo img {
                height: 40px;
            }

            .nav-buttons a {
                font-size: 14px;
            }

            .hero-content {
                padding: 20px 20px 40px;
                max-width: 80%;
            }

            .hero-content h1 {
                font-size: 2.2em;
            }

            .hero-content h3 {
                font-size: 1.2em;
            }

            .hero-content p {
                font-size: 1em;
                padding-left: 12px;
                padding-right: 12px;
            }

            .hero-content a {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/appAriologo.png') }}" alt="logo">
        </div>
        <div class="menu-toggle" onClick="toggleMenu()">☰</div>
        <div class="nav-buttons" id="nav-buttons">
            <a href="{{ route('usuarios.create') }}" class="btn-criar">criar conta</a>
            <a href="{{ route('login.form') }}" class="btn-login">login</a>
        </div>
    </header>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Bem vindo(a) ao Appário!</h1>
            <h3>Gerencie seu apiário com rapidez e eficiência.</h3>
            <p>Organize colmeias, produções, inspeções e muito mais com uma facilidade que só o nosso sistema pode proporcionar.</p>
            <a href="{{ route('usuarios.create') }}" class="btn-criar">comece agora!</a>
        </div>
    </section>

    @include('footer.footer')

    <script>
        function toggleMenu() {
            const navButtons = document.getElementById('nav-buttons');
            navButtons.classList.toggle('show');
        }
    </script>
</body>
</html>