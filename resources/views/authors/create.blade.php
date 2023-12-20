@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novo(a) Autor</h1>
        <form method="POST" action="{{ route('authors.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <a href="{{ route('authors.index') }}" class="btn btn-primary">Voltar para Autores</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
