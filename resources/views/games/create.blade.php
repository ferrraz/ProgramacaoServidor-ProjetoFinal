@extends('layouts.fo')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="form-card">

        <h3 class="text-center mb-4">Criar Jogo</h3>

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

        <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome do Jogo</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Lançamento</label>
                <input type="date" name="release_date" value="{{ old('release_date') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control"rows="3"></textarea>
            </div>

            <input type="hidden" name="studio_id" value="{{ $studio_id }}">

            <div class="mb-3">
                <label class="form-label">Fotografia</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-success w-100">
                Criar Jogo
            </button>
        </form>
    </div>
</div>
@endsection
