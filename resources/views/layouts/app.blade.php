<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Outros metadados e links CSS, como Bootstrap, podem ser adicionados aqui -->
    <title>Sistema de Biblioteca</title>
    <style>
        body {
            background-color: #181818;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 10% auto;
            
        }
        h1 {
            font-size: 24px;
        }
        .bg {
            background: rgba(16, 16, 16, 1);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background: rgba(58, 58, 58, 0.8);
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        }
        .login-form {
            display: flex;
            flex-direction: column;
        }
        .login-form input[type="email"], .login-form input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ff4b5a;
            color: white;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #ff2f43;
        }
        .login-form .create-account {
            background-color: transparent;
            color: #f8f8f8;
            text-align: center;
            text-decoration: underline;
            margin-top: 15px;
            padding: 5px;
        }

        /* Estilo para o footer */
        footer.footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #007bff; /* Cor de fundo azul */
            color: white; /* Cor do texto branco */
            text-align: center;
        }

            /* Estilize o fundo azul */
            footer.footer .bg-dark {
                background-color: #007bff; /* Cor de fundo azul */
            }

            /* Estilize o texto branco */
            footer.footer .text-white {
                color: white; /* Cor do texto branco */
            }

            /* Estilize o padding do footer */
            footer.footer .py-2 {
            }
        /* FIM Estilo para o footer */
    </style>
</head>
<body>
    @auth
        @include('partials.navbar')
    @endauth
    <main class="py-4">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>
