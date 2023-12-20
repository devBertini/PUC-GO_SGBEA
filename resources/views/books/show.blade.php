@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>

    <p><strong>Publisher:</strong> {{ $book->publisher->name }}</p>
    <p><strong>Year:</strong> {{ $book->year }}</p>
    <p><strong>Edition:</strong> {{ $book->edition }}</p>
    <p><strong>Acquisition Date:</strong> {{ $book->acquisition_date }}</p>
    <p><strong>Cost:</strong> {{ $book->cost }}</p>

    <h2>Autores:</h2>
    <ul>
        @foreach ($book->authors as $author)
            <li>{{ $author->name }}</li>
        @endforeach
    </ul>

    <h2>Área Jurídica:</h2>
    <p>{{ $book->lawAreas->first()->description }}</p>

    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar para Livros</a>
@endsection
