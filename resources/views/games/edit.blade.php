@extends('layouts.fo')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="form-card">

        <h3 class="text-center mb-4">Editar Jogo</h3>

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

        <form method="POST" action="{{ route('games.update', $game->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="text-center mb-3">
                @if($game->photo)
                    <img src="{{ asset('storage/' . $game->photo) }}" class="profile-img">
                @else
                    <img src="https://via.placeholder.com/120" class="profile-img">
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Nome do Jogo</label>
                <input type="text" name="name" value="{{ $game->name }}" class="form-control"required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Lançamento</label>
                <input type="date" name="release_date" value="{{ \Carbon\Carbon::parse($game->release_date)->format('Y-m-d') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control"rows="3">{{ $game->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Fotografia</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning w-100">
                Guardar Alterações
            </button>
        </form>
    </div>
</div>
@endsection
