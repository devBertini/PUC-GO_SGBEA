@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Cópia</h1>
        <form action="{{ route('copies.update', $copy->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="book_id">Livro:</label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $book->id == $copy->book_id ? 'selected' : '' }}>{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="copy_status_id">Status:</label>
                <select name="copy_status_id" id="copy_status_id" class="form-control">
                    @foreach ($copyStatuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == $copy->copy_status_id ? 'selected' : '' }}>{{ $status->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="location">Localização:</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $copy->location }}">
            </div>
            <a href="{{ route('copies.show', $copy->id) }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
@endsection
