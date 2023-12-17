@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Usuário</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <!-- Outras informações do usuário -->
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
</div>
@endsection
