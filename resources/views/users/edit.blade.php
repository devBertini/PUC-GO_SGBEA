@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuário</h1>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="form-group">
                <label for="password">Nova Senha (opcional):</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
