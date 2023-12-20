@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Novo Usuário</h1>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
@endsection
