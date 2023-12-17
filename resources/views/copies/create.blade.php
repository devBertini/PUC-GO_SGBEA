@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Exemplar</h1>
    <form action="{{ route('copies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="book_id">ID do Livro:</label>
            <input type="number" class="form-control" name="book_id" id="book_id" required>
        </div>
        <!-- Outros campos como status, localização, etc. -->
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
