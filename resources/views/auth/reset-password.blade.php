@extends('layouts.fo')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="password-card">

        <h3 class="text-center mb-3">Definir Nova Password</h3>

        <p class="text-center text-muted mb-4">
            Escolha uma nova password segura para a sua conta.
        </p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    value="{{ request()->email }}" 
                    name="email" 
                    type="email" 
                    class="form-control"
                    required
                >

                @error('email')
                    <div class="text-danger mt-2">
                        Email inválido ou inexistente
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Password</label>
                <input 
                    name="password" 
                    type="password" 
                    class="form-control"
                    required
                >

                @error('password')
                    <div class="text-danger mt-2">
                        Password inválida
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar Password</label>
                <input 
                    name="password_confirmation" 
                    type="password" 
                    class="form-control"
                    required
                >
            </div>

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <button type="submit" class="btn btn-primary w-100">
                Atualizar Password
            </button>

        </form>

    </div>
</div>
@endsection
