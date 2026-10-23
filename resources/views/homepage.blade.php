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
<div class="text-center">
    <h1 class="mb-4 fw-bold">Bem-vindo à Gestão de Jogos e Estúdios</h1>
    <p class="mb-4 text-muted">
        Gere os seus estúdios e jogos de forma simples e organizada.
    </p>
    @if(auth()->check())
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg px-4">
            Ir para Dashboard
        </a>
    @else
        <a href="{{ route('studios.index') }}" class="btn btn-primary btn-lg px-4">
            Ver Estúdios e Jogos
        </a>
    @endif
</div>          
@endsection
