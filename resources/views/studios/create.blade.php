@extends('layouts.fo')
@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="form-card">

        <h3 class="text-center mb-4">Criar Estúdio</h3>

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

        <form method="POST" action="{{ route('studios.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome do Estúdio</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fotografia</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-success w-100">
                Criar Estúdio
            </button>

        </form>

    </div>
</div>
@endsection
