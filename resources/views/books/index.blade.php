@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Adicionar Livro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Editora</th>
                <th>Ano</th>
                <th>Edição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->publisher->name }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->edition }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
