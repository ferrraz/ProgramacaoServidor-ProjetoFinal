@extends('layouts.fo')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="profile-card">

        <h3 class="text-center mb-4">Editar Perfil</h3>

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

        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="text-center mb-3">
                @if($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" class="profile-img">
                @else
                    <img src="https://via.placeholder.com/120" class="profile-img">
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fotografia</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Guardar Alterações
            </button>
        </form>
    </div>
</div>
@endsection
