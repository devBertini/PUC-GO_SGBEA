@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Livro</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <!-- Campos adicionais como editora, ano, etc. -->
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
