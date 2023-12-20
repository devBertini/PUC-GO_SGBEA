@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Cópia</h1>
        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $copy->id }}</td>
            </tr>
            <tr>
                <th>Livro:</th>
                <td>{{ $copy->book->title }}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{ $copy->status->description }}</td>
            </tr>
            <tr>
                <th>Localização:</th>
                <td>{{ $copy->location }}</td>
            </tr>
        </table>
        <a href="{{ route('copies.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('copies.edit', $copy->id) }}" class="btn btn-primary">Editar</a>
    </div>
@endsection
