<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<title>Registo</title>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <h2 class="text-center mb-4">Criar Conta</h2>

            {{-- ERROS --}}
            @if ($errors->any())
                <div class="register-error mb-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Registar
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Já tenho conta</a>
            </div>

        </div>
    </div>
</body>
</html>
