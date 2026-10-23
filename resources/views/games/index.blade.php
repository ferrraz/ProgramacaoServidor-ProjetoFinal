@extends('layouts.fo')
@section('content')
<div class="container mt-4">
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

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">Lista de Jogos</h1>

    {{-- BOTÃO SÓ PARA ADMIN --}}
    @auth
        @if(auth()->user()->role == 1)
            <a href="{{ route('games.create', ['studio_id' => $studio->id]) }}" 
               class="btn btn-success">
                + Criar Jogo
            </a>
        @endif
    @endauth
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle bg-white shadow-sm rounded">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Descrição</th>

                @auth
                    <th>Ações</th>
                @endauth
            </tr>
        </thead>

        <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{$game->id}}</td>
                    <td>
                        @if($game->photo)
                            <img src="{{ asset('storage/' . $game->photo) }}" style="width: 60px; height: 60px; object-fit: cover;" class="rounded">
                        @else
                            <span class="text-muted">Sem imagem</span>
                        @endif
                    </td>

                    <td class="fw-semibold">{{$game->name}}</td>
                    <td>{{$game->release_date}}</td>
                    <td>{{$game->description}}</td>

                    @auth
                        <td>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            @if(auth()->user()->role == 1)
                                <form action="{{ route('games.delete', $game->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"onclick="return confirm('Tem certeza que deseja apagar este jogo?')">Apagar</button>
                                </form>
                            @endif
                        </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
