@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listagem de Cópias</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Livro</th>
                    <th>Status</th>
                    <th>Localização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($copies as $copy)
                    <tr>
                        <td>{{ $copy->id }}</td>
                        <td>{{ $copy->book->title }}</td>
                        <td>{{ $copy->status->description }}</td>
                        <td>{{ $copy->location }}</td>
                        <td>
                            <a href="{{ route('copies.show', $copy->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('copies.edit', $copy->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('copies.destroy', $copy->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('copies.create') }}" class="btn btn-success">Criar Nova Cópia</a>
    </div>
@endsection
