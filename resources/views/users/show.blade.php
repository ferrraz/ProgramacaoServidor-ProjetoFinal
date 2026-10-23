@extends('layouts.fo')
@section('content')
{{-- SUCESSO --}}
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

{{-- ERROS --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="d-flex justify-content-center mt-5">
    @if($user)
        <div class="profile-card text-center">
            @if($user->photo)
                <img 
                    src="{{ asset('storage/' . $user->photo) }}" 
                    class="profile-img mb-3"
                >
            @else
                <img 
                    src="https://via.placeholder.com/120" 
                    class="profile-img mb-3"
                >
            @endif

            <h4 class="fw-bold">{{ $user->name }}</h4>

            <p class="text-muted mb-2">{{ $user->email }}</p>

            @if($user->role == 1)
                <span class="badge bg-danger mb-3">Administrador</span>
            @else
                <span class="badge bg-secondary mb-3">Utilizador</span>
            @endif

            <div>
                <a href="{{ route('users.edit', $user->id) }}" 
                class="btn btn-primary w-100">
                    Editar Perfil
                </a>
            </div>

        </div>
    @else
        <p class="text-center mt-5">Utilizador não encontrado.</p>
    @endif
</div>
@endsection
