@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tipos de Colaborador</h1>
    <a href="{{ route('collaborator_types.create') }}" class="btn btn-primary">Adicionar Tipo</a>
    <table class="table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collaboratorTypes as $type)
            <tr>
                <td>{{ $type->description }}</td>
                <td>
                    <a href="{{ route('collaborator_types.show', $type->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('collaborator_types.edit', $type->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('collaborator_types.destroy', $type->id) }}" method="POST" style="display:inline;">
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
