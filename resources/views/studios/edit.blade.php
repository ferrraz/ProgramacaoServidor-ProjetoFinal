@extends('layouts.fo')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="form-card">

        <h3 class="text-center mb-4">Editar Estúdio</h3>

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

        <form method="POST" action="{{ route('studios.update', $studio->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="text-center mb-3">
                @if($studio->photo)
                    <img 
                        src="{{ asset('storage/' . $studio->photo) }}" 
                        class="profile-img"
                    >
                @else
                    <img 
                        src="https://via.placeholder.com/120" 
                        class="profile-img"
                    >
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Nome do Estúdio</label>
                <input type="text" name="name" value="{{ $studio->name }}" class="form-control" required>
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
