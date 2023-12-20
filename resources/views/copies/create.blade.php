@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Nova Cópia</h1>
        <form action="{{ route('copies.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="book_id">Livro:</label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="copy_status_id">Status:</label>
                <select name="copy_status_id" id="copy_status_id" class="form-control">
                    @foreach ($copyStatuses as $status)
                        <option value="{{ $status->id }}">{{ $status->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="location">Localização:</label>
                <input type="text" name="location" id="location" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Criar Cópia</button>
            <a href="{{ route('copies.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
