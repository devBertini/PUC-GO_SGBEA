@extends('layouts.app')

@section('content')
    <h1>Create a New Book</h1>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="authors">Authors:</label>
            <select name="authors[]" id="authors" class="form-control" multiple>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="publisher">Editora:</label>
            <select name="publisher_id" id="publisher" class="form-control">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="law_areas">Área Jurídica:</label>
            <select name="law_areas[]" id="law_areas" class="form-control" multiple>
                @foreach ($lawAreas as $lawArea)
                    <option value="{{ $lawArea->id }}">{{ $lawArea->description }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="year">Ano:</label>
            <input type="text" name="year" id="year" class="form-control">
        </div>

        <div class="form-group">
            <label for="edition">Edição:</label>
            <input type="text" name="edition" id="edition" class="form-control">
        </div>

        <div class="form-group">
            <label for="acquisition_date">Data de Aquisição:</label>
            <input type="date" name="acquisition_date" id="acquisition_date" class="form-control">
            @error('acquisition_date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cost">Custo:</label>
            <input type="text" name="cost" id="cost" class="form-control">
        </div>

        <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar para Livros</a>
        <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
    </form>
@endsection
