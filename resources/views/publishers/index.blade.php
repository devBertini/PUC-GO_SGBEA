@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editoras</h1>
        <a href="{{ route('publishers.create') }}" class="btn btn-primary">Adicionar Editora</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->name }}</td>
                        <td>
                            <a href="{{ route('publishers.show', $publisher->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline;">
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
