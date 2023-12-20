@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Autor</h1>
    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome do(a) Autor:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $author->name }}" required>
        </div>
        <a href="{{ route('authors.index') }}" class="btn btn-primary">Voltar para Autores</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
