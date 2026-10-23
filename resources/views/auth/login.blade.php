<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<title>Login</title>
</head>
<body>

    <div class="login-container">
        <div class="login-card">

            <h2 class="text-center mb-4">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Entrar
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}">Esqueceu-se da password?</a>
            </div>

            <div class="text-center mt-2">
                <a href="{{ route('register') }}">Criar conta</a>
            </div>

        </div>
    </div>
</body>
</html>
