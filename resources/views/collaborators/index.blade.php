@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Colaboradores</h1>
    <a href="{{ route('collaborators.create') }}" class="btn btn-success mb-3">Adicionar Colaborador</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collaborators as $collaborator)
            <tr>
                <td>{{ $collaborator->name }}</td>
                <td>{{ $collaborator->email }}</td>
                <td>{{ $collaborator->phone }}</td>
                <td>
                    <a href="{{ route('collaborators.show', $collaborator->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('collaborators.edit', $collaborator->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('collaborators.destroy', $collaborator->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
