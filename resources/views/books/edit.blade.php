@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
        </div>

        <div class="form-group">
            <label for="authors">Autores:</label>
            <select name="authors[]" id="authors" class="form-control" multiple>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" @if(in_array($author->id, $book->authors->pluck('id')->toArray())) selected @endif>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="publisher">Editora:</label>
            <select name="publisher_id" id="publisher" class="form-control">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" @if($book->publisher_id === $publisher->id) selected @endif>{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="law_areas">Áreas Jurídicas:</label>
            <select name="law_areas[]" id="law_areas" class="form-control" multiple>
                @foreach($lawAreas as $lawArea)
                    <option value="{{ $lawArea->id }}" @if(in_array($lawArea->id, $book->lawAreas->pluck('id')->toArray())) selected @endif>{{ $lawArea->description }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="year">Ano:</label>
            <input type="text" name="year" id="year" class="form-control" value="{{ old('year', $book->year) }}">
            @error('year')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="edition">Edição:</label>
            <input type="text" name="edition" id="edition" class="form-control" value="{{ $book->edition }}">
        </div>

        <div class="form-group">
            <label for="acquisition_date">Data de Aquisição:</label>
            <input type="date" name="acquisition_date" id="acquisition_date" class="form-control" value="{{ old('acquisition_date', $book->acquisition_date) }}">
            @error('acquisition_date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cost">Custo:</label>
            <input type="text" name="cost" id="cost" class="form-control" value="{{ $book->cost }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Livro</button>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar para Livros</a>
    </form>
@endsection
