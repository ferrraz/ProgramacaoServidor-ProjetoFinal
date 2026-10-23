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

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Lista de Estúdios</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle bg-white shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Nº de Jogos</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($studios as $studio)
                    <tr>
                        <td>
                            @if($studio->photo)
                                <img 
                                    src="{{ asset('storage/' . $studio->photo) }}" 
                                    class="rounded" 
                                    style="width: 60px; height: 60px; object-fit: cover;"
                                >
                            @else
                                <span class="text-muted">Sem imagem</span>
                            @endif
                        </td>

                        <td>{{$studio->id}}</td>
                        <td class="fw-semibold">{{$studio->name}}</td>
                        <td>{{$studio->numbergames}}</td>

                        <td>
                            <a href="{{ route('games.index', $studio->id) }}" 
                            class="btn btn-sm btn-primary">
                                Ver Jogos
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection