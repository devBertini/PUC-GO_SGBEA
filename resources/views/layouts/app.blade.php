<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema de Biblioteca</title>
    <style>
        /* Estilo para o footer */
        .footer {
            width: 100%;
            background-color: #343a40; /* Cor de fundo mais escura */
            color: white; /* Cor do texto branco */
        }

        .footer p {
            margin: 0; /* Remove a margem padrão do parágrafo */
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        /* Ajustes para centralizar os itens da navegação */
        .navbar-nav.mx-auto {
            margin-right: 0;
            margin-left: 0;
        }

        /* Ajustes para o dropdown do usuário */
        .header .dropdown-toggle {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem; /* Espaçamento para tornar mais fácil clicar */
        }

        .header .dropdown-menu {
            right: 0; /* Alinha o dropdown à direita */
        }
    </style>
</head>
<body>
    @include('partials.header')

    @auth
        @include('partials.navbar')
    @endauth

    <main class="py-4">
        @yield('content')
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </main>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
