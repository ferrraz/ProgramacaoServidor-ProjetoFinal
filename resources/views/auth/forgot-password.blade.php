@extends('layouts.fo')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="password-card">

        <h3 class="text-center mb-3">Recuperar Password</h3>

        <p class="text-center text-muted mb-4">
            Introduza o seu email para receber o link de recuperação.
        </p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    name="email" 
                    type="email" 
                    class="form-control" 
                    placeholder="exemplo@email.com"
                    required
                >

                @error('email')
                    <div class="text-danger mt-2">
                        Email inválido ou inexistente
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Enviar link de recuperação
            </button>
        </form>

    </div>
</div>
@endsection
