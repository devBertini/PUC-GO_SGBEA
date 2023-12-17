@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Livro</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}" required>
        </div>
        <!-- Outros campos como editora, ano, edição, etc. -->
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
