<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Gestão de Estúdios</title>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
        </ul>
        <div class="ms-auto d-flex align-items-center">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>

            <a href="{{ route('users.show', auth()->user()->id) }}">
                <button class="btn btn-primary">Perfil</button>
            </a>
        @else
            <a href="{{ route('login') }}">
                <button type="button">Login</button>
            </a>

            <a href="{{ route('register') }}">
                <button type="button">Register</button>
            </a>
        @endauth
        </div>
        </div>
    </div>
    </nav>

    <button onclick="history.back()" class="btn-voltar">
        ← Voltar atrás
    </button>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>